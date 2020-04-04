<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Doctor;

class DoctorController extends Controller
{
    public function index(){
        $doctors = Doctor::paginate(5);
        return view('doctors/index', [
            'doctors'=> $doctors,
            ]);
    }

    public function show()
    {
        //first 
       //take the id from url param
       $request = request();
       $doctorId = $request->doctor;
        //sec
      
       $doctor = Doctor::find($doctorId);
       
       //send the value to the view
       return view('doctors.show',[
           'doctor' => $doctor,
       ]);
    }

    
}
