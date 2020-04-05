<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pharmacy; 



class PharmacyController extends Controller
{
    public function index()
    {
            $Pharmacies = Pharmacy::all();
            return view('pharmacies.index',[
                'Pharmacies' => $Pharmacies
                ]);
     }


     public function show()
    {
          $request=request();
          $pharmacy_id=$request->pharmacy;
          $pharmacy= Pharmacy::find($pharmacy_id);
 
          return view('pharmacies.show',[
         'pharmacy'=>$pharmacy
       ]);
     }



    public function edit()
    { 
      $request=request();
     $pharmacy_id=$request->pharmacy;
     $pharmacy= Pharmacy::find($pharmacy_id); 
 
     return view('pharmacies.edit',[
    
    'pharmacy'=>$pharmacy
    ]);
     }
 
    

 
 public function update()
 {
    $request=request();
   $pharmacy_id=$request->pharmacy;
   $pharmacy= Pharmacy::find($pharmacy_id); 
  /*  $validatedData = $request->validate([
    'name' => 'required|min:3',
    'email' => 'required|email:rfc,dns',
   ],[
    'name.required' => 'Please enter the pharmacy name ',
    'name.min' => 'Please the pharmacy name  has minimum of 3 character ',
    'email.required' => 'Please enter the email field',
   ]); */
     $pharmacy->update($request->all());
 
     return view('pharmacies.show',[
    
        'pharmacy'=>$pharmacy
        ]);
 }
     
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    }
