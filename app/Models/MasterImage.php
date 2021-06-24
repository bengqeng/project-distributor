<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class MasterImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category',
        'url_path',
        'images'
    ];

    public function url_path ($category, $images)
    {
        $imageName  = $category . '-' . time() . '.' . $images->extension();
        $url_path   = $images->move('master_image/', $imageName);

        return $url_path;
    }

    public function title ($title)
    {
        $title = $title . '-' . time();
        return $title;
    }

    public function scopelistImageForProduct($query)
    {
        return $query->where('category', 'product');
    }
}

