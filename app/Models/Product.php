<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'tabdesc',
        'howtouse',
        'ingredients',
        'category_id',
        'images_1',
        'images_2',
        'images_3',
        'images_4'
    ];

    use HasFactory;
    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function scopegetDetailProduct($query)
    {
        // return $query
        //     ->leftjoin('product')
    }
}
