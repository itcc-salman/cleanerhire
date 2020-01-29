<?php

namespace App\Services;

use App\Models\User;
use App\Models\Customer;
use App\Traits\CaptureIpTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Traits\ActivationTrait;
use Auth;

class CustomerService
{
    use ActivationTrait;

    protected $customer_model;
    protected $user_model;

    public function __construct()
    {
        $this->customer_model = new Customer;
        $this->user_model = new User;
    }

    public function getLoggedInCustomer()
    {
        if( Auth::user()->role == 'customer' ) {
            return $this->customer_model->where('user_id', Auth::id() )->first();
        }
        return false;
    }

    public function registerCustomerFront($data)
    {
        $ipAddress = new CaptureIpTrait();
        $user = $this->user_model->create([
            'first_name'        => $data->get('first_name'),
            'last_name'         => $data->get('last_name'),
            'email'             => $data->get('email'),
            'role'              => 'customer',
            'password'          => Hash::make($data->get('password')),
            'token'             => Str::random(64),
            'signup_ip_address' => $ipAddress->getClientIp(),
            'activated'         => !config('settings.activation'),
            'status'            => 1
        ]);

        $customer = $this->customer_model;
        $customer->user_id       = $user->id;
        $customer->phone         = $data->get('phone_number', NULL);
        $customer->created_by    = $user->id;
        $customer->updated_by    = $user->id;
        $customer->save();

        // send email for activation or verification
        $this->initiateEmailActivation($user);
        Auth::loginUsingId($user->id);
        return $user;
    }
}
