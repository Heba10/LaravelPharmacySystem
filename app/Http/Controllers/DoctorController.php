<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
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


    public function create()
    {
      

        return view('doctors.create');
    }

    public function store()
    {
         //get the request data
         $request = request();




         ////////////
        //    if ($request->hasFile("avatar_image")) {
        //     $path = Storage::putFile('public/avatar_image', $request->file('avatar_image'));
        //     $User=User::create([
        //     'name' => $request['name'],
        //     'email' => $request['email'],
        //     'password' => Hash::make($request['password']),
        //     'avatar_image'=>basename($path),
        //     'city_id'=>$request['city_id'],
        //     ]);
        // } elseif (! $request->hasFile("avatar_image")) {
        //     $User=User::create([
        //     'name' => $request['name'],
        //     'email' => $request['email'],
        //     'password' => Hash::make($request['password']),
        //     'city_id'=>$request['city_id'],
        //      ]);
        // }
         //////

         //store the request data in the db
      
            Doctor::create([
             'name' => $request->name,
             'national_id' =>  $request->national_id,
             'password' =>  Hash::make($request->password),
             'image' =>  $request->image,
             'email' =>  $request->email,
             'is_banned' => $request->is_banned,
             'pharamcy_id' => $request->pharamcy_id,




         ]);




         return redirect()->route('doctors.index');
    }

    public function edit() {
        $doctor = Doctor::find(request()->doctor);
    
        return view('doctors.edit', [
            
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
            'pharamcy_id' => $request->pharamcy_id,
        ]);
    
        return redirect()->route('doctors.index');
    }
    






    public function destroy() {
        $request = request();
    
        Doctor::where('id', $request->doctor)->delete();
    
        return redirect()->route('doctors.index');
    }

    
}
