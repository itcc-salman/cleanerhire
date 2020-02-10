<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CleanerAccountInfoStoreRequest extends FormRequest
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
                'nationality'   => 'required',
                'gender'        => 'required',
                'language'      => 'required',
            ];
            if( $this->input('role') == 'company' ) {
                // validation for company here
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
            'nationality.required' => 'Please add your nationality',
            'gender.required' => 'Gender is required',
            'language.required' => 'Language is required',
        ];
    }
}
