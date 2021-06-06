<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
  use HasFactory, Notifiable, HasRoles;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'uuid',
    'full_name',
    'email',
    'username',
    'password',
    'phone_number',
    'status_register',
    'birthday',
    'birth_place',
    'gender',
    'address',
    'province_id',
    'city_id',
    'kecamatan_id',
    'kelurahan_id',
    'rt',
    'rw',
    'post_code',
    'referral_id'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password'
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function generateReferal($length)
  {
    do
    {
      $pool           = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $code           = substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
      $user_refferal  = User::where('referral_id', $code)->get();
    }
    while(!$user_refferal->isEmpty());

    return $code;
  }

  public function generateUsername($model)
  {
    if(strtolower($model) == "outlet"){
      $typeUser = "agent";
    }
    elseif
    (strtolower($model) == "friends"){
      $typeUser = "distributor";
    }

    do
    {
      $pool           = '0123456789';
      $code           = substr(str_shuffle(str_repeat($pool, 5)), 0, 5);
      $newUsername    = $typeUser."-".$code;
      $user_refferal  = User::where('username', $newUsername)->get();
    }
    while(!$user_refferal->isEmpty());

    return $newUsername;
  }

  public function getUserLoggin($smartUser)
  {
    return User::where('banned', "=", false)
              ->where('status_register', "=", "approved")
              ->where(function($q) use ($smartUser) {
                  $q->Where('username', $smartUser)
                  ->orwhere('email', $smartUser);
              })
          ->get();
  }


}
