<?php

namespace App\Http\Controllers\Api;
use App\User;
use App\Address;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\AddressResource;
// use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response;


class AddressController extends Controller
{
    //--------------------------this function to show address of certain user
    public function show(Request $request){

        if(Address::find($request->address)){
            $address=Address::find($request->address);
            $user= User::find($address->user_id);
            return new AddressResource ($address);}
            else 
            return response(['Error'=>'Not exist , plz check the id'],404)->header('Content-Type', 'application/json');
    }
    //-------------------------------this function for user to add address
    public function store(Request $request){
      
        if(($request->user_id)){
            $user=User::find(($request->user_id));
            $validation=$request->validate(['area_id'=>'required',
            'street_name'=>'required',
             'building_number'=>'required',
             'floor_number'=>'required',
             'flat_number'=>'required',
             'is_main'=>'required',
             ]);
             if($validation){
            Address::create(['area_id'=>$request->area_id,
            'street_name'=>$request->street_name,
            'building_number'=>$request->building_number,
            'floor_number'=>$request->floor_number,
            'flat_number'=>$request->flat_number,
            'is_main'=>$request->is_main,
            'user_id'=>$user->id]);
            return response(['Success ,Address added successfully'],200)->header('Content-Type','application/json');
        }
        else{
            return response(['Error , All address feilds are required',400])->header('Content-Type','application/json');
        }

    }
    return response(['Error'=>'Not exist , plz check the id'],404)->header('Content-Type', 'application/json');
    }

    //-------------------------------------------this function for user to update his address
     public function update(Request $request){

        if(Address::find($request->address)){
            $user=User::find($request->user_id);
            $validation=$request->validate(['area_id'=>'required',
            'street_name'=>'required',
             'building_number'=>'required',
             'floor_number'=>'required',
             'flat_number'=>'required',
             'is_main'=>'required',
             ]);
             if($validation){
            Address::find($request->address)->update(['area_id'=>$request->area_id,
            'street_name'=>$request->street_name,
            'building_number'=>$request->building_number,
            'floor_number'=>$request->floor_number,
            'flat_number'=>$request->flat_number,
            'is_main'=>$request->is_main,
            'user_id'=>$request->user_id]);
            return response(['Success ,Address updated successfully'],200)->header('Content-Type','application/json');
        }
         else{
            return response(['Error , All address feilds are required',400])->header('Content-Type','application/json');
        }
    }
    return response(['Error'=>'Not exist , plz check the id'],404)->header('Content-Type', 'application/json');
    }
     //------------------this function to delete address of certain user
     public function destroy(Request $request){
        
        Address::find($request->address)->delete();
        return response(['Success ,Address deleted successfully'],200)->header('Content-Type','application/json');
       
     }
}
