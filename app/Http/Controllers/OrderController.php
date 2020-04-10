<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\Medicine;

use App\Prescription;

use DB;



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
        $medicines=Medicine::all();
   
          $statuses= ['New Order'=>'0'];
         
        return view('orders.create', [
            'users' => $users,
             'statuses' =>$statuses,
            'medicines'=>$medicines
        ]);
    }



    // public function store()
    // {
    //      //get the request data
    //      $request = request();

    //      //store the request data in the db
    //      Order::create([
    //         // 'total_price'=>$request->total_price,
    //         // 'creator_type'=>$request->creator_type,
    //         'order_user_id'=>$request->order_user_id,
    //         // 'pharmacy_id'=>$request->pharmacy_id,
    //          'status_id'=>$request->status_id,
    //         'is_insured' => $request->is_insured,
    //          'doctor_id' => $request->doctor_id,
    //          'delivering_address_id' =>  $request->delivering_address_id,
            
    //      ]);

    //      return redirect()->route('posts.index');
    // }





    public function destroy() {
        $request = request();
    
        Order::where('id', $request->order)->delete();
    
        return redirect()->route('orders.index');
    }
   



    function fetch(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('medicines')
        ->where('name', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#">'.$row->name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }

}
