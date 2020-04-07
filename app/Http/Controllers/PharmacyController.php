<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pharmacy; 
use App\Http\Requests\PharmacyRequest;




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
     public function create()
     {
       return view('pharmacies.create');
     }
     
 
     public function store( PharmacyRequest $request)
    { 
    // dd($request->image->store('images','public'));
     Pharmacy::create([
       'name' => $request->name,
       'password' =>$request->password,
       'email' =>$request->email,
       'area_id' =>$request->area_id,
       'priority' =>$request->priority,
       'national_id' =>$request->national_id,
       'image' =>$request->image->store('images','public')


 
     ]);
 
      session()->flash('success','Pharmacy created successfuly');
      return redirect()->route('pharmacy.index');
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
    $request->image;
   dd($request->file('image')->store('public/images'));
   //dd($pharmacy->image);
  /*  dd($pharmacy->image->store('images','public'));
   $pharmacy= Pharmacy::find($pharmacy_id); 
   $pharmacy->file('image');
   return $request->image->store('public'); */
 
   /* if($request->hasfile('image')){
   $file = $request->file('image');
   $extension = $file->getClientOriginalExtension();
   $filename = time() . '.' . $extension;
   $location = public_path('images/' . $filename);
   $pharmacy->image = $filename;
   }
  
    $validatedData = $request->validate([
    'name' => 'required|min:3',
    'email' => 'required|email:rfc,dns',
   ],[
    'name.required' => 'Please enter the pharmacy name ',
    'name.min' => 'Please the pharmacy name  has minimum of 3 character ',
    'email.required' => 'Please enter the email field',
    'email.email:rfc,dns' => 'Please enter a valid email address',
   ]); 
     $pharmacy->update($request->all());
     
     return view('pharmacies.show',[
    
        'pharmacy'=>$pharmacy
        ]); */
 }

 public function destroy()
 { 
  $request=request();
  $pharmacy_id=$request->pharmacy;
  $pharmacy= Pharmacy::find($pharmacy_id); 
  $pharmacy->delete();

  return redirect()->route('pharmacy.index');
 
  }
}
     
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
