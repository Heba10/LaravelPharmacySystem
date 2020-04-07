<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DateTime;
use App\Address;
use App\Order;
use App\Http\Resources\OrderResource;

class UserController extends Controller
{
    //--------------------this function for user to update his profile info
    public function update(Request $request){

        if(User::find($request->user)){
            $user=User::find($request->user);
            $user->update(['name'=>$request->name,
            'password'=>$request->password,'password_confirmation'=>$request->password_confirmation,
            'gender'=>$request->gender,'email'=>$user->email,'date_of_birth'=>new DateTime($request->date_of_birth),
            'image'=>$request->image,'mobile_number'=>$request->mobile_number,'last_login_date'=>new DateTime($request->last_login_date),
            'created_at'=>new DateTime($request->created_at),]);
            return response(['Success ,Ur info updated successfully'],200)->header('Content-Type','application/json');
        }
        else{
            return response(['Error'=>'Not exist , plz check the id'],404)->header('Content-Type', 'application/json');
        }
    }
    //----------------------------this function to see his orders
    public function index(Request $request){
           $userID=$request->user;
           if(User::find($userID)){
           $orders=Order::all()->where('order_user_id',$userID);
           return $orders;  
           }
           else{
            return response(['Error'=>'Not exist , plz check the id'],404)->header('Content-Type', 'application/json');
           }
    }
    //-------------------------this function to view certain order details
    public function show(Request $request){
        $orderId=$request->order;
        if(Order::find($orderId)){
            return new  OrderResource(Order::find($orderId));
        }
        else{
            return response(['Error'=>'Not exist , plz check the id'],404)->header('Content-Type', 'application/json');
           } 
    }
}
