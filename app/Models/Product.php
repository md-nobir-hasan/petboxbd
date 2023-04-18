<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class Product extends Model
{
    protected $fillable=['title','sku','slug','summary','description','cat_id','child_cat_id','price','brand_id','discount','status','photo','size','stock','is_featured','condition', 'product_gallery'];

    public function cat_info(){
        return $this->hasOne('App\Models\Category','id','cat_id');
    }
    public function brand_info(){
        return $this->hasOne('App\Models\Brand','id','brand_id');
    }
    public function sub_cat_info(){
        return $this->hasOne('App\Models\Category','id','child_cat_id');
    }
    public static function getAllProduct(){
        return Product::with(['cat_info','sub_cat_info'])->orderBy('id','desc')->paginate(10);
    }
    public function rel_prods(){
        return $this->hasMany('App\Models\Product','cat_id','cat_id')->where('status','active')->orderBy('id','DESC')->limit(8);
    }
    public function getReview(){
        return $this->hasMany('App\Models\ProductReview','product_id','id')->with('user_info')->where('status','active')->orderBy('id','DESC');
    }
    public function productGallery(){
        return $this->hasMany(ProductGallery::class,'product_id','id')->orderBy('id','DESC');
    }
    public static function getProductBySlug($slug){
        return Product::with(['cat_info','rel_prods','getReview'])->where('slug',$slug)->first();
    }
    public static function countActiveProduct(){
        $data=Product::where('status','active')->count();
        if($data){
            return $data;
        }
        return 0;
    }

    public function carts(){
        return $this->hasMany(Cart::class)->whereNotNull('order_id');
    }

    public function wishlists(){
        return $this->hasMany(Wishlist::class)->whereNotNull('cart_id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }
    public function color(){
        return $this->hasMany(PaColor::class,'product_id');
    }
    public function productSize(){
        return $this->hasMany(PaSize::class,'product_id');
    }
    public function orderItem(){
        return $this->hasMany(OrderItem::class,'product_id');
    }

    public function mainPrice(){
        return $this->price - $this->discount;
    }

    public function singelProductFetch($id){
        return Product::find($id);
    }

    public function wishlistCheck(){
        $product_id = $this->id;
        $ip_address = Request::ip();
        $check = null;
        if(Auth::user()){
            $user_id = Auth::user()->id;
           $check =  Wishlist::where('user_id',$user_id)->where('product_id',$product_id)->first();
        }else{
            $check = Wishlist::where('ip_address',$ip_address)->where('product_id',$product_id)->first();
        }
        return $check;
    }

    public function qualityRatting(){
        $rating = 0;
        $number = 1;
      $reviews =  Review::with(['user'])->where('product_id',$this->id)->get();
        foreach($reviews as $review){
            $rating += $review->quality;
            $number += 1;
        }
        $ratting = $rating/$number;
        if($ratting ==0){
            $ratting = 5;
        }
       return ceil($ratting);
    }

}
