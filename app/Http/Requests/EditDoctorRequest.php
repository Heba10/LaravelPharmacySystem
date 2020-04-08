<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditDoctorRequest extends FormRequest
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
            
        
            'email'=>'required|email|unique:users,email,' .$this->id,
            'name'=>'required|unique:users,name,' .$this->id, 
            
       
        ];
    }


    public function messages()
    {
        return [
        'email.required' => 'Please Fill out This Field!',
        'name.required' => 'Please Fill out This Field!',
         'email.unique' => 'Sorry,This Email is already exist!',
         'email.email' => 'Please enter a valid Email',
        
        
        ];
    }
}
