<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
    	'area_id',
    	'street_name',
        'building_number',
        'floor_number',
        'flat_number',
        'is_main',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function area(){
        return $this->belongsTo('App\Area');
    }

    
}
