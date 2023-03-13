<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaSize extends Model
{
    use HasFactory;
    protected $fillable = ['size_id','price_increase','des'];
    public function size(){
        return $this->belongsTo(ProductSize::class,'size_id');
    }
}
