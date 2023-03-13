<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    use HasFactory;
    public function color(){
        return $this->belongsTo(ProductColor::class,'color_id');
    }
    public function size(){
        return $this->belongsTo(ProductSize::class,'size_id');
    }
    public function imageGallery(){
        return $this->belongsTo(ImageGallery::class,'gallery_id');
    }
}
