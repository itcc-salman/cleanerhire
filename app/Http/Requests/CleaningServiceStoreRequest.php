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
                return [
                    'name'      => 'required',
                    'status'    => 'required',
                ];
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
            'name.required' => 'Name is required',
            'status.required' => 'Status is required',
        ];
    }
}
