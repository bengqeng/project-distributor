<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class CategoryProduct extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table = 'category_product';

    protected $fillable = [
        'category_name',
        'thumbnail_url',
        'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'category_name'
            ]
        ];
    }

    public function categoryUrlPath($category)
    {
        $imageName  = $category['category_name'] . '-' . time() . '.' . $category['thumbnail_image']->extension();
        $url_path   = $category['thumbnail_image']->move('master_image/category/', $imageName);

        return $url_path;
    }

    public function removeOldimage($thumbnailImage)
    {
        if (empty($thumbnailImage) || !File::exists($thumbnailImage)) {
            return;
        }

        unlink($thumbnailImage);
    }

    public function scopecategoryWithProduct($query)
    {
        return $query->leftjoin('product', 'product.category_id', '=', 'category_product.id')
        ->select('category_product.id AS CatetgoryId', 'category_product.category_name AS CatetgoryName', 'category_product.thumbnail_url AS CategoryPict', 'product.*', Product::raw('count(category_id) as sum'))
        ->groupBy('category_product.id')->orderBy('category_product.id', 'ASC');
        ;
    }
}
