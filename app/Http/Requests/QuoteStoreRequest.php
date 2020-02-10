<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuoteStoreRequest extends FormRequest
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
                'sub_services'  => 'required',
            ];
            if( $this->input('service_type') == 'residential' ) {
                // validation for residential services
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
