<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Spatie\Permission\Traits\HasRoles;


class Doctor extends Authenticatable
{

    use HasApiTokens, Notifiable;
    use HasRoles;

    protected $guard = 'doctor';


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

    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
