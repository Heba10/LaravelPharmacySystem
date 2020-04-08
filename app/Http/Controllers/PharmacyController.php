<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pharmacy; 
use App\Doctor;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\PharmacyRequest;
use Illuminate\Support\Facades\Hash;




class PharmacyController extends Controller
{
    public function index()
    {
            $Pharmacies = Pharmacy::paginate(5);
            return view('pharmacies.index',[
                'Pharmacies' => $Pharmacies,
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
      /*  [ if ($request->hasFile("image")) { */
       'name' => $request->name,
       'password' => Hash::make($request->password),
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
 
    

 
 public function update(Pharmacy $pharmacy)
 {
    $request=request();
    $pharmacy_id=$request->pharmacy;
    //$pharmacy= Pharmacy::find($pharmacy_id); 
    if($request->hasFile('image'))
    {
    /*  $image=$request->image->store('images');
     Storage::disk('public')->delete($pharmacy->image); */
       $image = Storage::putFile('public/images', $request->file('image'));
      $pharmacy->update([
        'name' => $request['name'],
        'email' => $request['email'],
        'password' => Hash::make($request['password']),
        'image'=>basename($path),
        'national_id'=>$request['national_id'],
        ]);
    }
    elseif (! $request->hasFile("image")) {
      $pharmacy->update([
      'name' => $request['name'],
      'email' => $request['email'],
      'password' => Hash::make($request['password']),
      'national_id'=>$request['national_id'],
       ]);
  } 
    session()->flash('success','Pharmacy updated successfuly');
    return redirect()->route('pharmacy.index');
   }

   /* 
    $request->image;
   dd($request->file('image')->store('public/images'));
   //dd($pharmacy->image); */
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
  
     $pharmacy->update($request->all());
     
     return view('pharmacies.show',[
    
        'pharmacy'=>$pharmacy
        ]); */
     

 public function destroy()
 { 
  $request=request();
  $pharmacy_id=$request->pharmacy;
  $pharmacy= Pharmacy::find($pharmacy_id); 
  $pharmacy->delete();

  return redirect()->route('pharmacy.index');
 
  }
}
     
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
