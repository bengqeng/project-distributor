<?php

namespace App\Models;

use Carbon\Carbon;
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
        'total_login',
        'banned'
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
        'total_login',
        'banned'
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
        $code           = substr(str_shuffle(str_repeat($pool, 3)), 0, 5);
        $newUsername    = $typeUser."-".$code;
        $user_refferal  = User::where('username', $newUsername)->get();
        }
        while(!$user_refferal->isEmpty());

        return $newUsername;
    }

    public function scopeNewRegister($query)
    {
        return $query->where('status_register', 'tertunda');
    }

    public function scopeApprovedUsers($query)
    {
        return $query->where('status_register', 'disetujui');
    }

    public function scopeRejectedUsers($query)
    {
        return $query->where('status_register', 'ditolak');
    }

    public function scopeBannedUsers($query)
    {
        return $query->where('banned', true);
    }

    public function getUserLoggin($smartUser)
    {
        $afterTrim          = str_replace(" ", "", $smartUser);
        $isPhone            = substr($afterTrim, 0, 3);
        $queryPhoneNumber   = "";

        if( (strpos($isPhone, '+62') !== false ) ){
            $queryPhoneNumber = $afterTrim;
        }
        elseif( (strpos($isPhone, '62') !== false ) ) {
            $queryPhoneNumber = "+" . $afterTrim;
        }
        elseif((strpos($isPhone, '08') !== false ) ) {
            $queryPhoneNumber = substr_replace($afterTrim, "+62", 0, 1);
        }
        elseif((strpos($isPhone, '8') !== false )){
            $queryPhoneNumber = "+62" . $afterTrim;
        }

        if($queryPhoneNumber != ""){
            return User::where('banned', "=", false)
                ->where('status_register', "=", "disetujui")
                ->where(function($q) use ($queryPhoneNumber) {
                    $q->whereRaw("REPLACE(phone_number, ' ' ,'') = ?", $queryPhoneNumber);
                })
            ->first();
        }
        else{
            return User::where('banned', "=", false)
                ->where('status_register', "=", "disetujui")
                ->where(function($q) use ($smartUser) {
                    $q->Where('username', $smartUser)
                    ->orWhere('email', $smartUser);
                })
            ->first();
        }
    }

    public function scopeuserRoleMustAdmin($query)
    {
        return $query
                ->whereHas("roles", function($q) {
                    $q->where("name", User::ADMIN);
                }
            );
    }

    public function scopeuserRoleMustMember($query)
    {
        return $query
                ->whereHas("roles", function($q) {
                    $q->whereIn("name", [User::AGENT, User::DISTRIBUTOR]);
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
        ->where('status_register', 'tertunda')
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

    public function scopeGroupByMonth($query)
    {
        $query->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('m');
        });
    }

    public function scopeMemberNearBy($query)
    {
        return $query->whereNotIn('id', [auth()->user()->id])
            ->where('province_id', '=',  auth()->user()->province_id);
    }

    public function scopeuserIsMember($query)
    {
        return $query->whereIn('account_type', [User::AGENT, User::DISTRIBUTOR]);
    }

    public function scopethisYear($query)
    {
        return $query->whereYear('created_at', Carbon::Now()->year);
    }

    public function scopeexceptAdmin($query)
    {
        $idAdmin = User::select('id')->userRoleMustAdmin()->get()->pluck('id');

        return $query->whereNotIn('id', $idAdmin);
    }
}
