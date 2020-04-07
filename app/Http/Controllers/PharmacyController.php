<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pharmacy; 



class PharmacyController extends Controller
{
    public function index()
    {
            $Pharmacies = Pharmacy::all();
            return view('pharmacies.index',[
                'Pharmacies' => $Pharmacies
                ]);
     }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    }
