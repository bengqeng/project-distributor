<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = ['title','slug','series','description','tabdesc','howtouse','ingredients','images_1','images_2','images_3','images_4'];
    use HasFactory;
}
