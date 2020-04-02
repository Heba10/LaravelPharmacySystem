<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    //



    public function order()
    {
         return $this->belongsToMany('App\Order', 'medicine_order');
    }

    public function pharmacy()
    { 
         return $this->belongsToMany('App\Pharmacy', 'medicine_pharmacy');
    }
}
