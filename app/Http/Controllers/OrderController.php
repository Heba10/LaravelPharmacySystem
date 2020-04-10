<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\Medicine;
use App\Doctor;

use App\Prescription;

use DB;



class OrderController extends Controller
{
    public function index(){
        $orders = Order::paginate(5);
        $doctors = Doctor::all();
        return view('orders/index', [
            'orders'=> $orders,
            'doctors'=> $doctors,

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
    public function show($id)
    {
        $order = Order::find($id);
        
        if($order)
            return new OrderResource($order);
        return ["error"=>"order not found"];
    }
    public function store(ApiOrderStoreRequest $request)
    {
        $order = $request->only(['is_insured','delivering_address_id']);
        $order['order_user_id']=Auth::id();
        $order['creator_type']="user";
        $order["status_id"]=0;
       
        $order=Order::create($order);

        if($request->hasFile('prescriptions'))
            $order->prescriptions = $request->file('prescriptions');

        return ["success"=>"your order was delivered successfully"];
    }


    public function update()
    {  $request=request();
        $order = Order::find($id);

        if(!$order)
            return ["error"=>"resource not found"];

        if($order->status_id!=0)
            return ["error"=>"can't update that order as it's not in new status"];
        
                
        if($request->hasFile('prescriptions'))
            $order->prescriptions = $request->file('prescriptions'); 
    
        if($request->has('cancel'))
            if($request->cancel==1){
                $order->status_id=3;
                $order->save();
            }
              
        
        return ["success"=>"updated sucessfully"];
    }




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
