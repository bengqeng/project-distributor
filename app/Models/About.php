<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $table = 'about';
    protected $fillable = ['title', 'description', 'images_id'];

    public function scopelandingPageAbout($query)
    {
        return $query->leftjoin('master_images', 'about.images_id', '=', 'master_images.id')->select('about.*', 'master_images.url_path AS url_image');
    }
}
