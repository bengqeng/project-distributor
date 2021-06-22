<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $table = 'social_media';
    protected $fillable = ['media_type','url','url_share'];
}
