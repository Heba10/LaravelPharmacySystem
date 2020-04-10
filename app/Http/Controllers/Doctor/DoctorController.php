<?php

namespace App\Http\Controllers\Doctor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Controllers\Controller;

use App\Http\Requests\EditDoctorRequest;


use App\Doctor;
use App\Pharmacy;
use App\User;


class DoctorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:doctor');
    }


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
       $doctor = User::findorfail($doctorId);
       $ban=$doctor->isBanned();
       $unban=$doctor->isNotBanned();
       return view('doctors.show', [
           'doctor' => $doctor,
           'ban'=>$ban,
           'unban'=>$unban,
       ]);
    }


    public function create()
    {
        $pharamcys = Pharmacy::all();

        return view('doctors.create', [
            'pharamcys' => $pharamcys
        ]);
    }

    public function store(StoreDoctorRequest $request)
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
    
    public function update(EditDoctorRequest $request) {

        $request = request();
    
        Doctor::where('id', $request->doctor)->update([
            
            'name' => $request->name,
            'email' =>  $request->email,
            'is_banned' => $request->is_banned,
            'pharmacy_id' => $request->pharmacy_id,
        ]);
    
        return redirect()->route('doctors.index');
    }


    public function ban()
    {
       $request = request();
       $userId = $request->doctor;
      
      // dd( User::findorfail($userId));
       $pharamcy_owner = User::findorfail($userId);
       $ban=$pharamcy_owner->ban();
        //dd($ban);
        return redirect()->route('pharmacy.index');
    }


    public function unban()
    {    
        $request = request();
        $userId = $request->doctor;
        $pharamcy_owner = User::findorfail($userId);
        $pharamcy_owner->unban();
        return redirect()->route('pharmacy.index');
    }
    






    public function destroy() {
        $request = request();
    
        Doctor::where('id', $request->doctor)->delete();
    
        return redirect()->route('doctors.index');
    }

    
}
