<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'service_type'  => 'required',
            'duration'      => 'required',
            'booking_date'  => 'required',
            'booking_time'  => 'required',
            'gender_pref'   => 'required',
            'has_pet'       => 'required',
        ];
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
            'gender_pref.required'      => 'Please select gender preference for butler',
            'has_pet.required'          => 'Please select pet option',
        ];
    }
}