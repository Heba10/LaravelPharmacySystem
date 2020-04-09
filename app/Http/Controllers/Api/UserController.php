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
        $orders=Order::get()->where('order_user_id',$userID);
        $i=0;
        foreach($orders as $order){
            $orderId=$order->id;
            $per=Prescription::get()->where('order_id',$orderId);
            $orderdetails=new OrderResource($order);
            $allOrders[$i]=$orderdetails;
            $i++;
        }
         return $allOrders;  
        }
        else{
         return response(['Error'=>'Not exist , plz check the id'],404)->header('Content-Type', 'application/json');
        }
 }
    //-------------------------this function to view certain order details
    public function show(Request $request){
        $userID=$request->user;
        if(User::find($userID)){
            if($order=Order::find($request->order)){
            if($order->order_user_id==$userID)
             return new OrderResource($order);
            }
             else{
                 return response(['Error'=>'u dont have order with this id'],404)->header('Content-Type', 'application/json');
             }
            }
            return response(['Error'=>'Not exist , plz check the id'],404)->header('Content-Type', 'application/json');
}
}

