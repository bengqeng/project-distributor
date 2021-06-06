<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterImage extends Model
{
    use HasFactory;
    protected $fillable = ['category','url_path','images'];
}
