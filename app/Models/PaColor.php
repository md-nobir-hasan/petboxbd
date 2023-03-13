<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaColor extends Model
{
    use HasFactory;
    protected $fillable = ['color_id','price_increase','des'];

    public function color(){
        return $this->belongsTo(ProductColor::class);
    }
    public function size(){
        return $this->belongsTo(ProductSize::class);
    }
}
