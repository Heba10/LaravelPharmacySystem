<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDoctorRequest;


use App\Doctor;
use App\Pharmacy;

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


    public function create()
    {
        $pharamcys = Pharmacy::all();

        return view('doctors.create', [
            'pharamcys' => $pharamcys
        ]);
    }

    public function store()
    {
         //get the request data
         $request = request();
         

         //store the request data in the db
      
            Doctor::create([
             'name' => $request->name,
             'national_id' =>  $request->national_id,
             'password' =>  Hash::make($request->password),
             'image' =>$request->image->store('images','public'),
             'email' =>  $request->email,
             'is_banned' => $request->is_banned,
             'pharmacy_id' => $request->pharmacy_id,




         ]);




         return redirect()->route('doctors.index');
    }

    public function edit() {
        $Pharmacys = Pharmacy::all();
        $doctor = Doctor::find(request()->doctor);
    
        return view('doctors.edit', [
            'Pharmacys' => $Pharmacys,
            'doctor' => $doctor
        ]);
    }
    
    public function update() {

        $request = request();
    
        Doctor::where('id', $request->doctor)->update([
            
            'name' => $request->name,
            'national_id' =>  $request->national_id,
            'password' =>  $request->password,
            'image' =>  $request->image,
            'email' =>  $request->email,
            'is_banned' => $request->is_banned,
            'pharmacy_id' => $request->pharmacy_id,
        ]);
    
        return redirect()->route('doctors.index');
    }
    






    public function destroy() {
        $request = request();
    
        Doctor::where('id', $request->doctor)->delete();
    
        return redirect()->route('doctors.index');
    }

    
}
