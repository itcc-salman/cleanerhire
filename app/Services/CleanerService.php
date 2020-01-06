<?php

namespace App\Services;

use App\Models\Cleaner;
use App\Models\User;
use App\Models\CleanerServiceMapping;
use App\Models\CleanerTiming;
use App\Models\ServiceArea;
use App\Traits\CaptureIpTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Traits\ActivationTrait;
use App\Services\CleaningServicesService;
use App\Services\PropertyService;
use Auth;
use Illuminate\Support\Facades\Storage;

class CleanerService
{
    use ActivationTrait;

    protected $cleaner_model;
    protected $user_model;

    public function __construct()
    {
        $this->cleaner_model = new Cleaner;
        $this->user_model = new User;
    }

    public function registerCleanerFront($data)
    {
        $ipAddress = new CaptureIpTrait();
        $user = $this->user_model->create([
            'first_name'        => $data['first_name'],
            'last_name'         => $data['last_name'],
            'email'             => $data['email'],
            'role'              => 'cleaner',
            'password'          => Hash::make($data['password']),
            'token'             => Str::random(64),
            'signup_ip_address' => $ipAddress->getClientIp(),
            'activated'         => !config('settings.activation'),
            'status'            => 1
        ]);

        $cleaner = $this->cleaner_model;
        $cleaner->user_id       = $user->id;
        $cleaner->first_name    = $data['first_name'];
        $cleaner->last_name     = $data['last_name'];
        $cleaner->email         = $data['email'];
        $cleaner->last_step     = 1;
        $cleaner->status        = 0;
        $cleaner->created_by    = $user->id;
        $cleaner->updated_by    = $user->id;
        $cleaner->save();

        // send email for activation or verification
        $this->initiateEmailActivation($user);
        Auth::loginUsingId($user->id);
        return $user;
    }

    public function getLogedInCleaner()
    {
        return $this->cleaner_model->with('user')->where('user_id', Auth::id())->first();
    }

    public function checkCleanerProfileStatus($cleaner_id = NULL)
    {
        if( !$cleaner_id ) {
            $cleaner = $this->cleaner_model->where('user_id', Auth::id())->first();
        } else {
            $cleaner = $this->cleaner_model->find($cleaner_id);
        }
        // check what data is completed and not completed
        // return [ 'personal_info' => true, 'account_info' => true, 'visa_documents' => true, 'services' => true, 'service_area' => true, 'availability' => true, ];
        $tasks = [
            'personal_info' => false,
            'account_info' => false,
            'visa_documents' => false,
            'services' => false,
            'service_area' => false,
            'availability' => false,
        ];
        if( $cleaner ) {
            // for personal info
            $tasks['personal_info'] = $this->checkPersonalInfo($cleaner);
            // for account info
            $tasks['account_info'] = $this->checkAccountInfo($cleaner);
            // for services
            $tasks['services'] = $this->checkServices($cleaner);
            // for service Areas
            $tasks['service_area'] = $this->checkServiceAreas($cleaner);
            // for visa_documents
            $tasks['visa_documents'] = $this->checkVisaDocuments($cleaner);
            // for availability
            $tasks['availability'] = $this->checkAvailability($cleaner);
        }
        return $tasks;
    }

    public function checkPersonalInfo(Cleaner $cleaner)
    {
        if( empty($cleaner->phone) ) { return false; }
        if( empty($cleaner->address_line_1) ) { return false; }
        if( empty($cleaner->city) ) { return false; }
        if( empty($cleaner->state) ) { return false; }
        if( empty($cleaner->postcode) ) { return false; }
        return true;
    }

    public function checkAccountInfo(Cleaner $cleaner)
    {
        if( empty($cleaner->tfn) && empty($cleaner->abn)) { return false; }
        if( empty($cleaner->visa_status) ) { return false; }
        if( !empty($cleaner->visa_status) && $cleaner->visa_status == 'other' && empty($cleaner->visa_status_other) ) { return false; }
        if( empty($cleaner->police_check) ) { return false; }
        if( empty($cleaner->own_car) ) { return false; }
        if( empty($cleaner->driver_license) ) { return false; }
        if( !empty($cleaner->driver_license) && $cleaner->driver_license != 'no' && (empty($cleaner->driver_license_state) || empty($cleaner->driver_license_number)) ) { return false; }
        if( empty($cleaner->nationality) ) { return false; }
        if( empty($cleaner->gender) ) { return false; }
        if( empty($cleaner->date_of_birth) ) { return false; }
        return true;
    }

    public function checkVisaDocuments(Cleaner $cleaner)
    {
        if( empty($cleaner->doc_driving_licence ) ) { return false; }
        if( empty($cleaner->doc_medicare_card ) ) { return false; }
        if( empty($cleaner->doc_passport ) ) { return false; }
        if( empty($cleaner->doc_bank_statement ) ) { return false; }
        if( empty($cleaner->doc_utility_bill ) ) { return false; }
        if( empty($cleaner->doc_certifications ) ) { return false; }
        if( empty($cleaner->doc_police_check ) ) { return false; }
        return true;

    }

    public function checkServices(Cleaner $cleaner)
    {
        $cleanerServices = CleanerServiceMapping::where('cleaner_id', $cleaner->id)->get();
        if( $cleanerServices->isEmpty() ) { return false; }
        if( $cleaner->user->role == 'company' ) {
            if( empty($cleaner->cleaner_properties) ) { return false; }
        }
        return true;
    }

    public function checkServiceAreas(Cleaner $cleaner)
    {
        $cleanerServiceAreas = ServiceArea::where('cleaner_id', $cleaner->id)->get();
        if( $cleanerServiceAreas->isEmpty() ) { return false; }
        return true;
    }

    public function checkAvailability(Cleaner $cleaner)
    {
        $cleanerAvailability = $this->getCleanerTimings($cleaner->id);
        if( $cleanerAvailability->isEmpty() ) { return false; }
        return true;
    }

    public function getCleanerTimings($cleaner_id = NULL)
    {
        if( $cleaner_id ) {
            return CleanerTiming::where('cleaner_id', $cleaner_id)->get();
        } else {
            $cleaner = $this->cleaner_model->where('user_id', Auth::id())->first();
            return CleanerTiming::where('cleaner_id', $cleaner->id)->get();
        }
    }

    public function getServiceAreas($cleaner_id = NULL)
    {
        if( $cleaner_id ) {
            return ServiceArea::where('cleaner_id', $cleaner_id)->get();
        } else {
            $cleaner = $this->cleaner_model->where('user_id', Auth::id())->first();
            return ServiceArea::where('cleaner_id', $cleaner->id)->get();
        }
    }

    public function getPartialViewData($view_name)
    {
        switch ($view_name) {
            case 'personal_info':
                return $this->getLogedInCleaner();
            break;
            case 'account_info':
                return $this->getLogedInCleaner();
            break;
            case 'visa_documents':
                return $this->getLogedInCleaner();
            break;
            case 'services':
                $services = new CleaningServicesService;
                $properties = new PropertyService;
                $data['cleaner'] = $this->getLogedInCleaner();
                $data['services'] = $services->getLogedInRoleWiseCleaningServices();
                $data['cleaner_services'] = $services->getLogedInCleanerServicesIds();
                $data['cleaner_properties'] = $properties->getAllActiveProperty();
                return $data;
            break;
            case 'service_area':
                return $this->getServiceAreas();
            break;
            case 'availability':
                $data = [];
                $timings = $this->getCleanerTimings()->toArray();
                // dd($timings);
                foreach (getDays() as $key => $day) {
                    $data[$day] = [];
                    foreach ($timings as $key => $value) {
                        if( $value['day'] == $day ) {
                            array_push($data[$day], $value);
                        }
                    }
                }
                return $data;
            break;
            default: return []; break;
        }
    }

    public function updateCleanerPersonalInfo($request)
    {
        $cleaner = $this->cleaner_model->where('user_id', Auth::id())->first();
        if( $cleaner ) {
            if( $request->file('profile_avatar') ) {
                $uploadedFile = $request->file('profile_avatar');
                $filename = time()."_".$cleaner->id.".".$uploadedFile->getClientOriginalExtension();

                Storage::disk('public_user_uploads')->putFileAs(
                    config('uploadpath.user_profile'),
                    $uploadedFile,
                    $filename
                );
                $cleaner->profile_avatar = $filename;
            }
            $cleaner->first_name = $request->get('first_name');
            $cleaner->last_name = $request->get('last_name');
            $cleaner->phone = $request->get('phone');
            $cleaner->mobile = $request->get('mobile');
            $cleaner->address_line_1 = $request->get('address_line_1');
            $cleaner->address_line_2 = $request->get('address_line_2');
            $cleaner->city = $request->get('city');
            $cleaner->state = $request->get('state');
            $cleaner->postcode = $request->get('postcode');
            $cleaner->save();
            return true;
        }
        return false;
    }

    public function updateCleanerAccountInfo($request)
    {
        $cleaner = $this->cleaner_model->where('user_id', Auth::id())->first();
        if( $cleaner ) {
            // update role
            $user = $this->user_model->find(Auth::id());
            $user->role = $request->get('role', $user->role);
            $user->save();

            if($user->role == 'company'){
                $cleaner->company_name = $request->get('company_name', $cleaner->company_name);
                $cleaner->director_name = $request->get('director_name', $cleaner->director_name);
                $cleaner->company_address = $request->get('company_address', $cleaner->company_address);
                $cleaner->company_email = $request->get('company_email', $cleaner->company_email);
                $cleaner->company_phone = $request->get('company_phone', $cleaner->company_phone);
                $cleaner->company_mobile = $request->get('company_mobile', $cleaner->company_mobile);
                $cleaner->insurance_details = $request->get('insurance_details', $cleaner->insurance_details);
                $cleaner->workcover_details = $request->get('workcover_details', $cleaner->workcover_details);
                $cleaner->registration_details = $request->get('registration_details', $cleaner->registration_details);
                $cleaner->business_years = $request->get('business_years', $cleaner->business_years);
                $cleaner->number_of_employees = $request->get('number_of_employees', $cleaner->number_of_employees);
            }

            if($request->has('tfn_or_abn')) {
                if($request->tfn_or_abn == 'abn') {
                    $cleaner->abn = $request->get('abn', $cleaner->abn);
                    $cleaner->tfn = null;
                }
                if($request->tfn_or_abn == 'tfn') {
                    $cleaner->tfn = $request->get('tfn', $cleaner->tfn);
                    $cleaner->abn = null;
                }
            }

            $cleaner->visa_status =  $request->has('visa_status') ? $request->get('visa_status') : $cleaner->visa_status;
            if($cleaner->visa_status == 'other') {
                $cleaner->visa_status_other = $request->get('visa_status_other', $cleaner->visa_status_other);
            } else {
                $cleaner->visa_status_other = null;
            }

            $cleaner->police_check = $request->get('police_check', $cleaner->police_check);
            $cleaner->own_car = $request->get('own_car', $cleaner->own_car);
            $cleaner->driver_license = $request->get('driver_license', $cleaner->driver_license);
            if($cleaner->driver_license != 'yes') {
                $cleaner->driver_license_state == null;
                $cleaner->driver_license_number == null;
            } else {
                $cleaner->driver_license_state = $request->get('driver_license_state', $cleaner->driver_license_state);
                $cleaner->driver_license_number = $request->get('driver_license_number', $cleaner->driver_license_number);
            }
            $cleaner->nationality = $request->get('nationality', $cleaner->nationality);

            $language = array();
            foreach ($request->get('language', $cleaner->language) as $key => $value) {
                $tmp = new \stdClass;
                $tmp->lname = $value['lname'];
                $tmp->lfluency = $value['lfluency'];
                $language[] = $tmp;
            }
            $cleaner->language = $language;

            $cleaner->gender = $request->has('gender') ? $request->get('gender') : $cleaner->gender;
            $cleaner->date_of_birth = $request->has('date_of_birth') ? $request->get('date_of_birth') : $cleaner->date_of_birth;
            $cleaner->save();
            return true;
        }
        return false;
    }

    public function updateCleanerServices($request)
    {
        // delete all data first
        $cleaner = $this->cleaner_model->where('user_id', Auth::id())->first();
        CleanerServiceMapping::where('cleaner_id', $cleaner->id)->delete();
        if( $request->has('cleaner_services_residential') ) {
            foreach ($request->get('cleaner_services_residential') as $key => $value) {
                $cleanerServiceMapping = new CleanerServiceMapping;
                $cleanerServiceMapping->cleaner_id = $cleaner->id;
                $cleanerServiceMapping->cleaning_service_id = $value;
                $cleanerServiceMapping->service_for = 'residential';
                if( Auth::user()->role == 'cleaner' ) {
                    $services = new CleaningServicesService;
                    $service = $services->getCleaningServiceById($value);
                    $cleanerServiceMapping->rate_per_hour = $service->rate_per_hour;
                } else {
                    $cleanerServiceMapping->rate_per_hour = $request->get("rate_per_hour_".$value, 0);
                }
                $cleanerServiceMapping->has_equipments = $request->get("has_equipment_residential_".$value, 0);
                $cleanerServiceMapping->save();
            }
        }
        if( $request->has('cleaner_services_commercial') ) {
            foreach ($request->get('cleaner_services_commercial') as $key => $value) {
                $cleanerServiceMapping = new CleanerServiceMapping;
                $cleanerServiceMapping->cleaner_id = $cleaner->id;
                $cleanerServiceMapping->cleaning_service_id = $value;
                $cleanerServiceMapping->service_for = 'commercial';
                $cleanerServiceMapping->rate_per_hour = $request->get("rate_per_hour_commercial_".$value, 0);
                $cleanerServiceMapping->has_equipments = $request->get("has_equipment_commercial_".$value, 0);
                $cleanerServiceMapping->save();
            }
        }

        $cleaner_properties = $request->get('cleaner_properties', null);
        // if($cleaner->user->role == 'company' && $cleaner_properties){}
        if($cleaner_properties){
            $cleaner->cleaner_properties = implode(',', $cleaner_properties);
        }else{
            $cleaner->cleaner_properties = null;
        }
        $cleaner->save();
        return true;
    }

    public function updateCleanerAvailability($request)
    {
        // delete all data first
        $cleaner = $this->cleaner_model->where('user_id', Auth::id())->first();
        CleanerTiming::where('cleaner_id', $cleaner->id)->delete();
        if( $request->has('avail') ) {
            foreach ($request->get('avail') as $key => $value) {
                $_has_24hours = false;
                // check for time now
                foreach ($request->get('select_from_'.$value) as $k => $from) {
                    if( $from == '24' ) { $_has_24hours = true; }
                }
                if( !$_has_24hours ) {
                    foreach ($request->get('select_to_'.$value) as $ke => $to) {
                        if( $to == '24' ) { $_has_24hours = true; }
                    }
                }
                if( $_has_24hours ) {
                    $cleanerTiming = new CleanerTiming;
                    $cleanerTiming->cleaner_id = $cleaner->id;
                    $cleanerTiming->day = $value;
                    $cleanerTiming->start_hours = "24";
                    $cleanerTiming->is_opened = 1;
                    $cleanerTiming->save();
                } else {
                    // it has proper timing do entry for all
                    $c = 0;
                    foreach ($request->get('select_from_'.$value) as $k => $from) {
                        $cleanerTiming = new CleanerTiming;
                        $cleanerTiming->cleaner_id = $cleaner->id;
                        $cleanerTiming->day = $value;
                        $cleanerTiming->start_hours = $from;
                        $cleanerTiming->end_hours = $request->get('select_to_'.$value)[$c];
                        $cleanerTiming->is_opened = 1;
                        $cleanerTiming->save();
                        $c++;
                    }
                }
            }
        }
        return true;
    }

    public function updateCleanerServiceAreas($request)
    {
        $cleaner = $this->cleaner_model->where('user_id', Auth::id())->first();
        ServiceArea::where('cleaner_id', $cleaner->id)->delete();
        if($request->has('service_area_counter') && $request->get('service_area_counter') != 0 && $request->get('service_area_counter') > 0 ){
            $counter = $request->get('service_area_counter');
            for ($i=1; $i <= $counter; $i++) {
                if($request->has('suburb_name_'.$i) && $request->has('area_in_km_'.$i) && $request->has('latitude_'.$i) && $request->has('longitude_'.$i)){
                    $csa = new ServiceArea();
                    $csa->cleaner_id = $cleaner->id;
                    $csa->suburb_name = $request->get('suburb_name_'.$i);
                    $csa->area_in_km = $request->get('area_in_km_'.$i);
                    $csa->latitude = $request->get('latitude_'.$i);
                    $csa->longitude = $request->get('longitude_'.$i);
                    $csa->save();
                }

            }
        }
        return true;
    }

    public function updateCleanerDocuments($data)
    {
        $cleaner = $this->cleaner_model->where('user_id', Auth::id())->first();
        if($cleaner && $data['data'] && $data['doc_type']){
            switch ($data['doc_type']) {
                case 'doc_driving_licence':
                    $cleaner->doc_driving_licence = $data['data'];
                    break;
                case 'doc_medicare_card':
                    $cleaner->doc_medicare_card = $data['data'];
                    break;
                case 'doc_passport':
                    $cleaner->doc_passport = $data['data'];
                    break;
                case 'doc_bank_statement':
                    $cleaner->doc_bank_statement = $data['data'];
                    break;
                case 'doc_utility_bill':
                    $cleaner->doc_utility_bill = $data['data'];
                    break;
                case 'doc_certifications':
                    $cleaner->doc_certifications = $data['data'];
                    break;
                case 'doc_police_check':
                    $cleaner->doc_police_check = $data['data'];
                    break;

                default:
                    # code...
                    break;
            }
            $data['message'] = 'File uploaded & updated successfully..!';
            $cleaner->save();
        } else {
            $data['code'] = 400;
            $data['data'] = null;
            $data['message'] = 'Something went wrong..!';
        }
        return $data;
    }
}
