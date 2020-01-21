<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CleaningServiceStoreRequest extends FormRequest
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
                    'name'          => 'required',
                    'status'        => 'required',
                ];
                if( !empty($this->input('residential')) ) {
                    $rule['rate_per_hour'] = 'required|regex:/^\d+(\.\d{1,2})?$/';
                }
                if( !empty($this->input('commercial')) ) {
                    $rule['rate_per_hour_com'] = 'required|regex:/^\d+(\.\d{1,2})?$/';
                }
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
            'name.required'                 => 'Name is required',
            'rate_per_hour.required'        => 'Residential Rate is required',
            'rate_per_hour.regex'           => 'Please add proper rate',
            'rate_per_hour_com.required'    => 'Commercial Rate is required',
            'rate_per_hour_com.regex'       => 'Please add proper rate',
            'status.required'               => 'Status is required',
        ];
    }
}
