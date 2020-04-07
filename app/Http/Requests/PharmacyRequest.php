<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PharmacyRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'national_id' => 'required',
            'area_id' => 'required',
            'priority' => 'required',

            
        ];
    }

    public function messages()
{
    return [
        'name.required' => 'Please enter the pharmacy name ',
        'email.required' => 'Please enter the email field',
        'email.email:rfc,dns' => 'Please enter a valid email address',
        'national_id.email:rfc,dns' => 'Please enter a valid email address',
        'area_id.email:rfc,dns' => 'Please enter a valid email address',
        'priority.email:rfc,dns' => 'Please enter a valid email address',

       ]; 
} 
}
