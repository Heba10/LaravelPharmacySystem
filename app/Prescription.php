<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    //


    public function order(){
        return $this->belongsTo('App\Order');
    }
}
