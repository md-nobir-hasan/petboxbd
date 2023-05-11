<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['order_id','product_id','p_size_id','p_color_id','qty','price','created_at','updated_at'];

    public function color(){
        return $this->belongsTo(PaColor::class,'p_color_id');
    }
    public function size(){
        return $this->belongsTo(PaSize::class,'p_size_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
