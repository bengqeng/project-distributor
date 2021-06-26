<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;
    protected $table = 'category_product';

    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'category_name'
            ]
        ];
    }
    public function scopelandingPageCategory($query)
    {
        return $query->leftjoin('master_images', 'category_product.images_id', '=', 'master_images.id')->select('category_product.*', 'master_images.url_path AS url_image');
    }
}
