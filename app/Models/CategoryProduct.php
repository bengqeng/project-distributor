<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class CategoryProduct extends Model
{
    use HasFactory;
    protected $table = 'category_product';

    protected $fillable = [
        'category_name',
        'thumbnail_url'
    ];

    public function categoryUrlPath ($category)
    {
        $imageName  = $category['category_name'] . '-' . time() . '.' . $category['thumbnail_image']->extension();
        $url_path   = $category['thumbnail_image']->move('master_image/category/', $imageName);

        return $url_path;
    }

    public function removeOldimage ($thumbnailImage)
    {
        if(empty($thumbnailImage) || !File::exists($thumbnailImage)){return;}

        unlink($thumbnailImage);
    }
}
