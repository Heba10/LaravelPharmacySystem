<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
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
            
                'name'=>'required|unique:doctors',
                'email'=>'required|unique:doctors|email',
                'password'=>'required|min:6|',
                'national_id'=>'required',
                'image'=>'mimes:jpeg,jpg,png',
           
        ];


    }

    public function messages()
    {
        return [
        'email.required' => 'Please Fill out This Field!',
        'name.required' => 'Please Fill out This Field!',
        'name.unique' => 'Sorry,This name is already exist!',
         'email.unique' => 'Sorry,This Email is already exist!',
         'email.email' => 'Please enter a valid Email',
         'password.required' => 'Please Fill out This Field!',
         'password.min' => 'Your password is too short',
         'national_id'=>'Please Fill out This Field!',
         'image'=>'Uploaded file is not a valid image. Only JPG and JPEG  files are allowed'
        ];
    }
}
