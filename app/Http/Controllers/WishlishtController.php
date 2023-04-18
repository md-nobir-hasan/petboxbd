<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWishlistRequest;
use App\Http\Requests\UpdateWishlistRequest;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class WishlishtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()){
            $n['wishlists'] = Wishlist::with(['product'])->where('user_id',Auth::user()->id)->get();
        }else{
            $n['wishlists'] = Wishlist::with(['product'])->where('ip_address',request()->ip())->get();
        }
        $n['payments'] = Payment::all();
        // if($id){
        //     $n['products'] = Product::where('cat_id',$id)->get();
            $n['name'] = 'Your Wishlist';
        //     // $n['categories'] = Category::all();
        //     $n['sliders'] = Slider::all();

            // return view('frontend.all_product',$n);
        // }
        return view('frontend.wishlist',$n);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWishlistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWishlistRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWishlistRequest  $request
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWishlistRequest $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlist $wishlist)
    {
        //
    }
}
