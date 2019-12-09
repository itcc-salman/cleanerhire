<?php

namespace App\Services;

use App\Models\Cleaner;
use App\Models\User;
use App\Traits\CaptureIpTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Traits\ActivationTrait;
use App\Services\CleaningServicesService;

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
        \Auth::loginUsingId($user->id);
        return $user;
    }

    public function getLogedInCleaner()
    {
        return $this->cleaner_model->with('user')->where('user_id', \Auth::id())->first();
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
            case 'services':
                $services = new CleaningServicesService;
                $data['services'] = $services->getLogedInRoleWiseCleaningServices();
                $data['cleaner_services'] = $services->getLogedInCleanerServicesIds();
                return $data;
            break;
            default: return []; break;
        }
    }

    public function calculateCleanerProgress()
    {
        // get cleaner data
        $cleaner = $this->getLogedInCleaner();
    }

    public function updateCleanerPersonalInfo($data)
    {
        $cleaner = $this->cleaner_model->where('user_id', \Auth::id())->first();
        if( $cleaner ) {
            $cleaner->first_name = $data->get('first_name');
            $cleaner->last_name = $data->get('last_name');
            $cleaner->phone = $data->get('phone');
            $cleaner->mobile = $data->get('mobile');
            $cleaner->address_line_1 = $data->get('address_line_1');
            $cleaner->address_line_2 = $data->get('address_line_2');
            $cleaner->city = $data->get('city');
            $cleaner->state = $data->get('state');
            $cleaner->postcode = $data->get('postcode');
            $cleaner->save();
            return true;
        }
        return false;
    }

    public function updateCleanerAccountInfo($request)
    {
        $cleaner = $this->cleaner_model->where('user_id', \Auth::id())->first();
        if( $cleaner ) {
            // update role
            $user = $this->user_model->find(\Auth::id());
            $user->role = $request->get('role', $user->role);
            $user->save();

            if($request->has('tfn_or_abn')) {
                if($request->tfn_or_abn == 'abn') {
                    $cleaner->abn =  $request->get('abn', $cleaner->abn);
                    $cleaner->tfn = null;
                }
                if($request->tfn_or_abn == 'tfn') {
                    $cleaner->tfn =  $request->get('tfn', $cleaner->tfn);
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
            $cleaner->nationality =  $request->get('nationality', $cleaner->nationality);

            $language = array();
            foreach ($request->get('language', $cleaner->language) as $key => $value) {
                $tmp = new \stdClass;
                $tmp->lname = $value['lname'];
                $tmp->lfluency =  $value['lfluency'];
                $language[] = $tmp;
            }
            $cleaner->language =  $language;

            $cleaner->gender =  $request->has('gender') ? $request->get('gender') : $cleaner->gender;
            $cleaner->date_of_birth =  $request->has('date_of_birth') ? $request->get('date_of_birth') : $cleaner->date_of_birth;
            $cleaner->save();
            return true;
        }
        return false;
    }
}
