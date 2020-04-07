<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::paginate(5);
        return view('orders/index', [
            'orders'=> $orders,
            ]);
    }


    public function create()
    {
        $users = User::all();

        return view('orders.create', [
            'users' => $users
        ]);
    }




    public function store()
    {
         //get the request data
         $request = request();

         //store the request data in the db
         Order::create([
            // 'total_price'=>$request->total_price,
            // 'creator_type'=>$request->creator_type,
            'order_user_id'=>$request->order_user_id,
            // 'pharmacy_id'=>$request->pharmacy_id,
             'status_id'=>$request->status_id,
            'is_insured' => $request->is_insured,
             'doctor_id' => $request->doctor_id,
             'delivering_address_id' =>  $request->delivering_address_id,
            
         ]);

         return redirect()->route('posts.index');
    }





    public function destroy() {
        $request = request();
    
        Order::where('id', $request->order)->delete();
    
        return redirect()->route('orders.index');
    }
   

}
