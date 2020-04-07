<?php
namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'name', 'email', 'password','gender','password_confirmation','date_of_birth','image','mobile_number','national_id','last_login_date',
  ];
  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
        'password', 'remember_token',
  ];

  //relation between Role and User mant to many
  public function roles(){

    return $this->belongsToMany('App\Role');

  }


} //end of class
