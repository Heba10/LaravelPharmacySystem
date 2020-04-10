<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Pharmacy;


class RevenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $rev=array();
        $pharmacies_total=0;
        $pharmacies = Pharmacy::all();
        foreach($pharmacies as $pharmacy)
            {
                $orders=Order::where('pharmacy_id',$pharmacy->id)->get();
                $TotalOrders=$orders->count();
                $TotalRevenue=$orders->sum('total_price');
                $pharmacies_total=$pharmacies_total+$TotalRevenue;
                array_push($rev,
                [  'image'=> $pharmacy->image,
                    'name'=> $pharmacy->name,
                    'TotalRevenue'=> $TotalRevenue,
                    'TotalOrders'=> $TotalOrders,
                ]);
            
            }
        if(request()->ajax())
        {    
            return DataTables()->of($rev)
            ->rawColumns(['action'])
            ->make(true);  
        }

        return view('revenues',[
            'pharmacies_total' => $pharmacies_total,
        ]);
    }
}
