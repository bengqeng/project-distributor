<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;
    protected $table = 'carousel';
    protected $fillable = ['title', 'description', 'images_id'];

    public function scopelandingPageCarousel($query)
    {
        return $query->leftjoin('master_images', 'carousel.images_id', '=', 'master_images.id')->select('carousel.*', 'master_images.url_path AS url_image');
    }
}
