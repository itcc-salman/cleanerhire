<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cleaner;
use App\Models\CleanerServiceMapping;
use App\Models\CleanerTiming;
use App\Models\ServiceArea;
use App\Models\User;
use App\Services\CommonService;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CleanerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        return view('backend.cleaners.index');
    }

    public function getAllCleaners(Request $request)
    {
        $data = array();
        $cleaners = Cleaner::all();

        $data['code'] = 200;
        $data['cleaners'] = $cleaners;
        return response()->json($data);
    }

    public function cleanerApplications(Request $request)
    {
        return view('backend.cleaners.applications');
    }

    public function getPendingCleaners(Request $request)
    {
        $data = array();
        $cleaners = Cleaner::pending()->get();

        $data['code'] = 200;
        $data['cleaners'] = $cleaners;
        return response()->json($data);
    }

    public function cleanerApplicationsPreview(Request $request)
    {
         if($request->id && $request->id != ''){
            $cleaner = Cleaner::find($request->id);
            if($cleaner){
                $cleaner = Cleaner::find($request->id);
            }else{
                setflashmsg('Cleaner not Found..!','0');
                return redirect()->route('backend.cleaners_applications');
            }
        }
        return view('backend.cleaners.applications_preview')->with('cleaner', $cleaner);
    }
    public function cleanerApplicationsApprove(Request $request)
    {
        if($request->id && $request->id != ''){
            $cleaner = Cleaner::find($request->id);
            if($cleaner){
                $cleaner->status = 3;
                $cleaner->save();
                setflashmsg('Cleaner Approved Successfully..!','1');
            }else{
                setflashmsg('Cleaner not Found..!','0');
            }
        }
        return redirect()->route('backend.cleaners_applications');
    }


    public function add(Request $request)
    {
        // session()->pull('backend');
        // dd(session()->all());
        return view('backend.cleaners.add');
    }

    public function postCreate(Request $request)
    {
        $data = array();
        // return response()->json($data);
        $last_step = $request->get('last_step', null);
        if($last_step == 1){

            $user = new User();
            $user->first_name = $request->get('first_name');
            $user->last_name = $request->get('last_name');
            $user->email = $request->get('email');
            $user->status = 1;
            $user->token = Str::random(64);
            $user->role = 'cleaner';
            $password = 'cleaner@123';
            $user->password = Hash::make($password);
            $user->save();

            $cleaner = new Cleaner();
            $cleaner->user_id = $user->id;
            $cleaner->first_name = $request->get('first_name');
            $cleaner->last_name = $request->get('last_name');
            $cleaner->email = $request->get('email');
            $cleaner->phone = $request->get('phone', null);
            $cleaner->mobile = $request->get('mobile', null);
            $cleaner->address_line_1 = $request->get('address_line_1', null);
            $cleaner->address_line_2 = $request->get('address_line_2', null);
            $cleaner->postcode = $request->get('postcode', null);
            $cleaner->city = $request->get('city', null);
            $cleaner->state = $request->get('state', null);
            $cleaner->last_step = $last_step;
            $cleaner->created_by =  Auth::Id();
            $cleaner->updated_by =  Auth::Id();
            $cleaner->status = 1;
            $cleaner->save();

            // $request->session()->put('backend.last_step', $last_step);
            // $request->session()->put('backend.cleaner_id', $cleaner->id);
            // $request->session()->put('backend.user_id', $cleaner->user_id);
        }

        $data['code'] = 200;
        $data['cleaner'] = $cleaner;
        $data['message'] = 'Cleaner created successfully..!';
        return response()->json($data);
    }

    public function getCleanerById(Request $request)
    {
        $data = array();
        $cleaner = Cleaner::find($request->id);
        if(!$cleaner){
            $data['code'] = 400;
            $data['cleaner'] = null;
            $data['message'] = 'Cleaner not Found..!';
        }
        $data['code'] = 200;
        $data['cleaner'] = $cleaner;
        return response()->json($data);
    }

    public function edit(Request $request)
    {
        $cleaner = Cleaner::find($request->id);
        if(!$cleaner){
            return back();
        }
        return view('backend.cleaners.edit')->with('cleaner',$cleaner);
    }

    public function postUpdate(Request $request)
    {

        $data = array();
        $data['code'] = 400;
        $data['cleaner'] = null;
        $data['message'] = 'Invalid Cleaner';
        $id = $request->get('id', null);
        $last_step = $request->get('last_step', null);

        if($id){
            $cleaner = Cleaner::with(['cleanerServices','cleanerTimings'])->find($id);
            if($cleaner){
                $user = User::find($cleaner->user_id);
                if($last_step == 1){
                    $user->first_name = $request->get('first_name', $user->first_name);
                    $user->last_name = $request->get('last_name', $user->last_name);
                    $user->save();


                    $cleaner->first_name = $request->get('first_name', $cleaner->first_name);
                    $cleaner->last_name = $request->get('last_name', $cleaner->last_name);
                    // $cleaner->email = $request->get('email', $cleaner->email);
                    $cleaner->phone = $request->get('phone', $cleaner->phone);
                    $cleaner->mobile = $request->get('mobile', $cleaner->mobile);
                    $cleaner->address_line_1 = $request->get('address_line_1', $cleaner->address_line_1);
                    $cleaner->address_line_2 = $request->get('address_line_2', $cleaner->address_line_2);
                    $cleaner->postcode = $request->get('postcode', $cleaner->postcode);
                    $cleaner->city = $request->get('city', $cleaner->city);
                    $cleaner->state = $request->get('state', $cleaner->state);
                    $cleaner->save();

                }else if($last_step == 2){
                    $user->role = $request->get('role', $user->role);

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

                    if($request->has('tfn_or_abn')){
                        if($request->tfn_or_abn == 'abn'){
                            $cleaner->abn =  $request->get('abn', $cleaner->abn);
                            $cleaner->tfn = null;
                        }
                        if($request->tfn_or_abn == 'tfn'){
                            $cleaner->tfn =  $request->get('tfn', $cleaner->tfn);
                            $cleaner->abn = null;
                        }
                    }

                    $cleaner->visa_status =  $request->get('visa_status', $cleaner->visa_status);
                    if($cleaner->visa_status == 'other'){
                        $cleaner->visa_status_other = $request->get('visa_status_other', $cleaner->visa_status_other);
                    }else{
                        $cleaner->visa_status_other = null;
                    }

                    $cleaner->police_check = $request->get('police_check', $cleaner->police_check);
                    $cleaner->own_car = $request->get('own_car', $cleaner->own_car);
                    $cleaner->driver_license = $request->get('driver_license', $cleaner->driver_license);
                    if($cleaner->driver_license != 'yes'){
                        $cleaner->driver_license_state == null;
                        $cleaner->driver_license_number == null;
                    }else{
                        $cleaner->driver_license_state = $request->get('driver_license_state', $cleaner->driver_license_state);
                        $cleaner->driver_license_number = $request->get('driver_license_number', $cleaner->driver_license_number);
                    }
                    $cleaner->nationality =  $request->get('nationality', $cleaner->nationality);

                    $language = array();
                    foreach ($request->get('language', $cleaner->language) as $key => $value) {
                        $tmp = new \stdClass;
                        $tmp->lname = $value['lname'];
                        $tmp->lfluency =  $value['lfluency'];
                        $language[] = $tmp;
                    }
                    $cleaner->language =  $language;

                    $cleaner->gender =  $request->get('gender', $cleaner->gender);
                    $cleaner->date_of_birth =  $request->get('date_of_birth', $cleaner->date_of_birth);

                    $cleaner->doc_driving_licence =  $request->get('doc_driving_licence', $cleaner->doc_driving_licence);
                    $cleaner->doc_medicare_card =  $request->get('doc_medicare_card', $cleaner->doc_medicare_card);
                    $cleaner->doc_passport =  $request->get('doc_passport', $cleaner->doc_passport);
                    $cleaner->doc_bank_statement =  $request->get('doc_bank_statement', $cleaner->doc_bank_statement);
                    $cleaner->doc_utility_bill =  $request->get('doc_utility_bill', $cleaner->doc_utility_bill);
                    $cleaner->doc_certifications =  $request->get('doc_certifications', $cleaner->doc_certifications);
                    $cleaner->doc_police_check =  $request->get('doc_police_check', $cleaner->doc_police_check);

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

                }else if($last_step == 3){
                    $cleaner->cleanerServices()->delete();

                    $cleaner_services = $request->get('cleaner_services_residential',[]);
                    foreach ($cleaner_services as $key => $service) {
                        $csm = new CleanerServiceMapping();
                        $csm->cleaner_id = $cleaner->id;
                        $csm->cleaning_service_id = $service;
                        $csm->service_for = 'residential';
                        $csm->rate_per_hour = $request->get('rate_per_hour_'.($service), 0);
                        $csm->has_equipments = $request->get('has_equipment_residential_'.($service), 0);
                        $csm->save();
                    }
                    $cleaner_services = $request->get('cleaner_services_commercial',[]);
                    foreach ($cleaner_services as $key => $service) {
                        $csm = new CleanerServiceMapping();
                        $csm->cleaner_id = $cleaner->id;
                        $csm->cleaning_service_id = $service;
                        $csm->service_for = 'commercial';
                        $csm->rate_per_hour = $request->get('rate_per_hour_commercial_'.($service), 0);
                        $csm->has_equipments = $request->get('has_equipment_commercial_'.($service), 0);
                        $csm->save();
                    }

                    $cleaner_properties = $request->get('cleaner_properties', null);
                    if($cleaner->user->role == 'company' && $cleaner_properties){
                        $cleaner->cleaner_properties = implode(',', $cleaner_properties);
                    }else{
                        $cleaner->cleaner_properties = null;
                    }
                }else if($last_step == 4){
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
                }else if($last_step == 5){
                    $cleaner->status = 3;
                    $cleaner->save();
                    // session()->pull('backend');
                    setflashmsg('Customer Updated Successfully..!','1');
                }

                $cleaner->updated_by =  Auth::Id();
                $cleaner->last_step =  $request->has('last_step') ? $request->get('last_step') : $cleaner->last_step;
                $cleaner->save();
                $user->save();
                $cleaner->refresh();
                $data['code'] = 200;
                $data['cleaner'] = $cleaner;
                $data['html'] =  view('backend.cleaners.partials.step5')->with('cleaner',$cleaner)->with('user',$user)->render();
                $data['message'] = 'Cleaner updated successfully..!';
            }
        }
        return response()->json($data);

    }

    public function postDelete(Request $request)
    {
        $data = array();
        $id = $request->has('id') ? $request->get('id') : null;
        $cleaner = Cleaner::find($id);

        if(!$cleaner){
            $data['code'] = 400;
            $data['message'] = 'Invalid Cleaner';
        }else{
            $cleaner->delete();
            $data['code'] = 200;
            $data['message'] = 'Cleaner deleted successfully..!';
        }
        return response()->json($data);
    }

    public function saveUploadedFile(Request $request) {
        $commonService = new CommonService;
        $data = $commonService->saveUploadedFile($request);
        return response()->json($data);
    }
}
