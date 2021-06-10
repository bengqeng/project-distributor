<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class MasterImage extends Model
{
  use HasFactory;
  protected $fillable = ['category','url_path','images'];



public function url_path ($category, $images)
{
  $imageName = $category . '-' . time() . '.' .
  $images->extension();
  $url_path = $images->move('master_image/', $imageName);

  return $url_path;
}

public function title ($category)
{
  $title = $category . '-' . time();
  return $title;

}

}

