<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    public const FOOTER = 'footer';

    protected $table = 'social_media';
    protected $fillable = ['media_type','url','url_share', 'show'];

    function scopefooter($query){
        $query->where('view_type', SocialMedia::FOOTER)->where('show', true);
    }
}
