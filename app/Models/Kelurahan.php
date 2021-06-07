<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;
    protected $table = 'kelurahan';

    public function kelurahanByKecamatan($idKecamatan)
    {
        return Kelurahan::where('id_kec', $idKecamatan)->get();
    }
}
