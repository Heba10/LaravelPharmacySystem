<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Address;

class OrderController extends Controller
{
    //----------------------------this function to add new order
    public function store(Request $request){

       if(User::find($request->user)){
         $docId=$request->doctor_id;
         if ($request->file('perceptions')) {
             $image=$request->perceptions;
            foreach ($image as $files) {
            $destinationPath = 'images/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $insert[] = "$profileImage";
            $perception=implode(" ",$insert);
            }
            if(Address::find($request->delivering_address_id)){
                if($request->user==Address::find($request->delivering_address_id)->user_id){
                    Order::create([
                        'delivering_address_id'=>$request->delivering_address_id, 
                        'doctor_id'=>$docId,    
                        'is_insured'=>$request->is_insured,
                        'status_id'=>$request->status_id,
                        'pharmacy_id'=>$request->pharmacy_id,
                        'total_price'=>$request->total_price,
                        'creator_type'=>$request->creator_type,
                        'order_user_id'=>$request->user,
                        'perceptions'=>$perception]);
                }
                else{
                    return response(['Error'=>'this Address not belongs to u ?!'],404)->header('Content-Type', 'application/json');
                }
                
            }
            else{
                return response(['Error'=>'Not exist , plz check the address id'],404)->header('Content-Type', 'application/json');
            }
        }
           return response(['Success ,Order added successfully'],200)->header('Content-Type','application/json');
       }
       else{
        return response(['Error'=>'Not exist , plz check the id'],404)->header('Content-Type', 'application/json');
       }
    }
    //-------------------------this function to update certain order
    public function update(Request $request){
        if(Order::find($request->order)){
            $order=Order::find($request->order);
             if($order->status_id==4){
                $order->update([
                    'delivering_address_id'=>$request->delivering_address_id, 
                    'doctor_id'=>$request->doctor_id,    
                    'is_insured'=>$request->is_insured,
                    'status_id'=>$request->status_id,
                    'pharmacy_id'=>$request->pharmacy_id,
                    'total_price'=>$request->total_price,
                    'creator_type'=>$request->creator_type,
                    'order_user_id'=>$request->user
                   ]); 
                   return response(['Success ,Order updated successfully'],200)->header('Content-Type','application/json');
             }
             else{
                return response(['Sorry'=>'this order can\'t be updated '],404)->header('Content-Type', 'application/json');

             }
        }
        else{
            return response(['Error'=>'Not exist , plz check the order ID'],404)->header('Content-Type', 'application/json');
           } 
    }
    
}
