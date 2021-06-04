<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;
    protected $table = 'kabupaten';

    public function kabupatenByIdProvinsi($idPorvinsi)
    {
        return Kabupaten::where('id_prov', $idPorvinsi)->get();
    }
}
