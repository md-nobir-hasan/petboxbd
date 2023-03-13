<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddToCart extends Model
{
    use HasFactory;
    protected $fillable = ['ip_address','user_id','product_id','qty','p_color_id','p_size_id','price'];
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function color(){
        return $this->belongsTo(PaColor::class,'p_color_id');
    }
    public function size(){
        return $this->belongsTo(PaSize::class,'p_size_id');
    }

    public function priceIncrease(){

        if($this->size_id){
            $price_increase =  PaSize::where('size_id',$this->size_id)
                                ->where('product_id',$this->product_id)
                                ->first();
        }
        if($this->color_id){
            $price_increasec =  PaColor::where('color_id',$this->color_id)
                                ->where('product_id',$this->product_id)
                                ->first();
        }

            if($this->size_id && $this->color_id){
                return ($price_increase->price_increase ?? 0) + ($price_increasec->price_increase ?? 0);
            }
            elseif($this->size_id){
                return $price_increase->price_increase ?? 0;
            }
            elseif($this->color_id){
                return $price_increasec->price_increase ?? 0;
            }
            else{
                return 0;
            }
    }
}
