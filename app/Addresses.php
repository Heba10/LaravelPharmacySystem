<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
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
        return $this->belongsTo('App\user');
    }
}
