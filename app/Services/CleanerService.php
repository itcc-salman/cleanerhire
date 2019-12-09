<?php

namespace App\Services;

use App\Models\Cleaner;
use App\Models\User;
use App\Traits\CaptureIpTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Traits\ActivationTrait;

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
        return $this->cleaner_model->with('user')->find(\Auth::id());
    }

    public function getPartialViewData($view_name)
    {
        switch ($view_name) {
            case 'personal_info':
                return $this->getLogedInCleaner();
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
        $cleaner = $this->cleaner_model->find(\Auth::id());
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
}
