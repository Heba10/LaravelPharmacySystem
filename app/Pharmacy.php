<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    //


    
    public function medicine()
    { 
         return $this->belongsToMany('App\Medicine', 'medicine_pharmacy');
    }

    
    public function area(){
        return $this->belongsTo('App\Area');
    }
    

}
