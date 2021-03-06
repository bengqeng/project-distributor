<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'kecamatan';

    public function kecamatanByKabupaten($idKecamatan)
    {
        return Kecamatan::where('id_kab', $idKecamatan)->get();
    }
}
