<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'name',
        'national_id',
        'password',
        'image',
        'email',
        'is_banned',
        'pharmacy_id',
      
    ];

    public function pharmacy (){
        return $this->belongsTo('App\Pharmacy');
    }
}
