<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Spatie\Permission\Traits\HasRoles;


class Pharmacy extends Authenticatable
{

    use HasApiTokens, Notifiable;
    use HasRoles;

    protected $guard = 'pharmacy';
    
    protected $fillable = [
        'name',
        'national_id',
        'image',
        'email',
        'password',
        'area_id',
        'priority',
    ];
    
    public function medicine()
    { 
         return $this->belongsToMany('App\Medicine', 'medicine_pharmacy');
    }

    
    public function area(){
        return $this->belongsTo('App\Area');
    }

    protected $hidden = [
        'password', 'remember_token',
    ];
    

}
