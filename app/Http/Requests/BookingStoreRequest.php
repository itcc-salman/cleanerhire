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
            if( !empty($this->input('service_type')) && $this->input('service_type') == 'residential' ) {
                // check for service
                if( $this->input('service') == 'other' ) {
                    // check for sub services
                    // if( in_array($this->input('sub_service'), $charges_service_ids) ) {
                        // verify details
                    // }
                }
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
        ];
    }
}
