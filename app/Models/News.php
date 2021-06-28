<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'article';

    public function scopelandingPageNews($query)
    {
        return $query->leftjoin('master_images', 'article.images_id', '=', 'master_images.id')->select('article.*', 'master_images.url_path AS url_image');
    }
}
