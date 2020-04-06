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

   

}
