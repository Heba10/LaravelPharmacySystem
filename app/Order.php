<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'delivering_address_id',     
        'is_insured',
        'status_id',
        'pharmacy_id',
        'order_user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function address(){
        return $this->belongsTo('App\Addresses');
    }
    public function statuses(){
        return $this->belongsTo('App\Statuses');
    }

    public function medicine(){

    return $this->belongsToMany('App\Medicine', 'medicine_order');
    }


    public function doctor(){
        return $this->belongsTo('App\Doctor');
    }
}
