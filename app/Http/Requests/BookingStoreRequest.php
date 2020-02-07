<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Stripe;

class BookingStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        switch($this->method())
        {
            case 'GET': return []; break;
            case 'POST':
            $rule = [
                'service_type'  => 'required',
                'service'       => 'required',
                // 'booking_date'  => 'required',
                // 'booking_time'  => 'required',
                // 'gender_pref'   => 'required',
            ];
            $charges_service_ids = [1,2,3];
            if( in_array($this->input('service'), $charges_service_ids) ) {
                // verify card details
                // $number = $this->input('service');
                // $exp_month = $this->input('service');
                // $exp_year = $this->input('service');
                // $cvc = $this->input('service');
                Stripe\Stripe::setApiKey('sk_test_y3o7tq6J2K4UMHmQsqZB3Sgl00ep0pMIfN');
                $token = Stripe\Token::create([
                  'card' => [
                    'number' => '4242424242424242',
                    'exp_month' => 1,
                    'exp_year' => 2021,
                    'cvc' => '314',
                  ],
                ]);
                \Log::debug($token);
            }
            /*
            if( empty($this->input('has_pet_optional')) ) {
                $rule['has_pet'] = 'required';
            }
            */

            return $rule;
            break;
            default: break;
        }
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'service_type.required'     => 'Please select job type first',
            'service.required'          => 'Please select service',
            'gender_pref.required'      => 'Please select gender preference for butler',
            'has_pet.required'          => 'Please select pet option',
        ];
    }
}
