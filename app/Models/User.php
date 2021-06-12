<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    public const ADMIN        = 'Admin';
    public const AGENT        = 'Agent';
    public const DISTRIBUTOR  = 'Distributor';
    use HasFactory, Notifiable, HasRoles, LogsActivity;

    protected static $logOnlyDirty = true;
    protected static $ignoreChangedAttributes = [
        'uuid',
        'full_name',
        'email',
        'username',
        'password',
        'phone_number',
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
        'referral_id',
        'total_login',
        'updated_at'
    ];

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
        'referral_id',
        'total_login'
    ];

    protected static $logAttributes = [
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
        'referral_id',
        'total_login'
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
        $typeUser = "distributor";
        }
        elseif
        (strtolower($model) == "friends"){
        $typeUser = "agent";
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

    public function scopeNewRegister($query)
    {
        return $query->where('status_register', 'hold');
    }

    public function scopeApprovedUsers($query)
    {
        return $query->where('status_register', 'approved');
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

    public function scopeNotAdmin($query)
    {
        return $query
                ->whereHas("roles", function($q) {
                    $q->where("name" , "!=", User::ADMIN);
                }
            );
    }

    public function scopeUsersNotBanned($query)
    {
        return $query->where('banned', false);
    }

    public function scopeAllPendingRegistration($query)
    {
        return $query
        ->where('status_register', 'hold')
        ->whereDoesntHave('roles');
    }

    public function accountType($accountType)
    {
        if($accountType == "outlet")
        {
            $type = "distributor";
        }
        elseif($accountType == "friends")
        {
            $type = "agent";
        }
        else
        {
            $type = "not found";
        }

        return $type;
    }

    public function scopeGetUserArea($query)
    {
        return $query
            ->leftjoin('provinsi', 'users.province_id', '=', 'provinsi.id_prov')
            ->select('users.*', 'provinsi.nama AS nama_provinsi');
    }

    public function scopeDetailUser($query)
    {
        return $query
            ->leftjoin('provinsi', 'users.province_id', '=', 'provinsi.id_prov')
            ->leftjoin('kabupaten', 'users.city_id', '=', 'kabupaten.id_kab')
            ->leftjoin('kecamatan', 'users.kecamatan_id', '=', 'kecamatan.id_kec')
            ->leftjoin('kelurahan', 'users.kelurahan_id', '=', 'kelurahan.id_kel')
            ->select('users.*', 'provinsi.nama AS nama_provinsi', 'kabupaten.nama AS nama_kabupaten', 'kecamatan.nama AS nama_kecamatan', 'kelurahan.nama AS nama_kelurahan' );
    }
}
