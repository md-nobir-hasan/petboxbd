<?php

namespace App\Http\Controllers;

use App\Models\AddToCart;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\CompanyInfo;
use App\Models\CompanyContact;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use App\Models\Page;
use App\Models\Payment;
use App\Models\Shipping;
use App\Models\Product;
use App\Models\Review;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FrontendController extends Controller
{

    /*public function redirect(){
        $user = Auth::user()->user_info_id;

        if ($user == '1'){
            return view('backend.pages.index');
        }else{
            return view('frontend.index');
        }
    }

    public function indexs(){
        return view('frontend.index');
    }*/


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Artisan::call('optimize:clear');
        //websiteSetting check
        $data = CompanyInfo::all();
            if(count($data)<1){
                return redirect()->route('company-details.create');
            }

            $n['shipping'] = Shipping::all();
            $n['brands'] = Brand::all();
            $n['categories'] = DB::table('categories')->orderBy('id', 'DESC')->limit('6')->get();
            $n['sliders'] = Slider::all();
            $n['banners1'] = DB::table('banners')->orderBy('id', 'ASC')->limit('1')->first();
            $n['banners2'] = DB::table('banners')->orderBy('id', 'DESC')->limit('1')->first();

            $n['timer_products'] = Product::orderBy('id', 'DESC')->where('time_to','!=',null)->limit('1')->get();

           if(serviceCheck('No Product Type')){
            $n['products'] = Product::orderBy('id', 'DESC')->limit('6')->get();
           }else{
                if($npc = serviceCheck('New Product')){
                    $n['new_product'] = Product::whereBetween('created_at', [now()->subDays($npc->service->checking), now()])->where('time_to',null)->orderBy('id', 'DESC')->get();
                    $n['products'] = Product::WhereNotBetween('created_at', [now()->subDays($npc->service->checking), now()])->where('time_to',null)->orderBy('id', 'DESC')->get();
                }
                if($pc = serviceCheck('Best Selling Product')){
                    $n['best_selling_prouct'] = Product::withSum('orderItem','qty')->orderBy('order_item_sum_qty','desc')->take($pc->service->checking)->where('time_to',null)->orderBy('id', 'DESC')->get();
                    if(count($n['best_selling_prouct'])){
                        foreach($n['best_selling_prouct'] as $value){
                            $n['products'] =  $n['products']->where('id','!=',$value->id);
                        }
                    }
                }
           }

        return view('frontend.index',$n);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        // $rule = [
        //     'name'=>'string|required',
        //     'shipping_id'=>'required',
        //     'quantity'=>'required',
        //     'address'=>'string|required',
        //     'phone'=>'numeric|required',
        // ];
        // $msg = [];
        // $attributes = [
        //     'name'=>'First Name',
        //     'address'=>'Address',
        //     'phone'=>'Phone Number',
        //     'post_code'=>'string|nullable',
        //     'shipping_id'=>'Shipping Method'
        // ];
        // Validator::make($request->all(),$rule,$msg,$attributes);

        $order_number = 'ORD-'.strtoupper(Str::random(10));
        if(Auth::user()){
            $user_id = Auth::user()->id;
            $cart_check = AddToCart::where('user_id',$user_id)->first();
            if($cart_check){
                AddToCart::where('user_id',$user_id)->where('product_id',$request->product_id)->delete();
            }
        }else{
            $check = ModelsUser::where('phone',$request->phone)->first();
            if($check){
                $user_id = $check->id;
                $cart_check = AddToCart::where('user_id',$user_id)->where('product_id',$request->product_id)->first();
                if($cart_check){
                    AddToCart::where('user_id',$user_id)->where('product_id',$request->product_id)->delete();
                }
            }else{
                $cart_check = AddToCart::where('ip_address',$request->ip())->where('product_id',$request->product_id)->first();
                if($cart_check){
                    AddToCart::where('ip_address',$request->ip())->where('product_id',$request->product_id)->delete();
                }

                $user_create = new ModelsUser();
                $user_create->name = $request->name;
                $user_create->phone = $request->phone;
                $user_create->email = $request->email;
                $user_create->address = $request->address;
                $user_create->password = Hash::make(12345678);
                $user_create->save();
                $user_id = $user_create->id;
            }
        }
            $insert=new Order();
            $insert->order_number = $order_number;
            $insert->user_id = $user_id;
            $insert->shipping_id = $request->shipping_id;
            $insert->payment_id = $request->payment_id;
            $insert->ip_address = $request->ip();
            $insert->name = $request->name;
            $insert->phone = $request->phone;
            $insert->email = $request->email;
            $insert->address = $request->address;
            $insert->note = $request->note;
            $insert->subtotal = $request->subtotal;
            $insert->total = $request->subtotal + Shipping::find($request->shipping_id)->price;
            $insert->payment_number = $request->payment_number;
            $insert->transection = $request->transection;
            $insert->country = $request->country;
            $insert->district = $request->district;
            $insert->thana = $request->thana;

            // Status Status

            $order_statuses = OrderStatus::first();
            if($order_statuses !=null){
                $insert->order_status = $order_statuses->name;
            }else{
                 $insert->order_status = 'New';
            }


            $insert->status = 'active';
            $insert->save();

                // foreach($request->order_item as $key => $order){
                    // dd($order);
                    $order_item = new OrderItem();
                    $order_item->order_id = $insert->id;
                    $order_item->product_id = $request->product_id;
                    $order_item->p_size_id = $request->p_size_id;
                    $order_item->p_color_id = $request->p_color_id;
                    $order_item->qty = $request->qty;
                    $order_item->price = $request->subtotal;
                    $order_item->save();
                // }


        request()->session()->flash('success'," Order successfully placed");
        return redirect()->route('order.thanks',[$insert->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

   public function productFetch($id = null){
        if($id){
            $n['company_info'] = CompanyInfo::first();
            $n['company_contact_info'] = CompanyContact::first();
            dd($n['company_contact_info']);
            $n['products'] = Product::where('cat_id',$id)->get();
            return view('frontend.index',$n);
        }
    }

    public function categoryWiseShow($id = null){
        if($id){
            $n['products'] = Product::where('cat_id',$id)->get();
            $n['name'] = 'Products of '.Category::find($id)->title;
            // $n['categories'] = Category::all();
            $n['sliders'] = Slider::all();

            return view('frontend.all_product',$n);
        }
    }
    public function subcatWiseShow($id,$id2){
        // if($id){
            $n['products'] = Product::with(['category'])->where('cat_id',$id)->where('subcat_id',$id2)->get();
            $n['name'] = 'Products of '.Category::find($id)->title;
            $n['sliders'] = Slider::all();
            return view('frontend.all_product',$n);
        // }
    }

    // All category show
    public function all_category(){
        $n['categories'] = Category::all();
        return view('frontend.all_category', $n);
    }

    // All product show
    public function all_product(){
        $n['products'] = Product::paginate(30);
        $n['sliders'] = Slider::all();
        $n['name'] = 'All Products';
        return view('frontend.all_product', $n);
    }

    // Product details code
    public function product_details($id){
        $n['data'] = Product::with(['productGallery','productGallery.imageGallery','productGallery.color','productGallery.size','productSize','productSize.size','color','color.color'])->find($id);
        $n['shippings'] = Shipping::all();
        $n['payments'] = Payment::all();
        $n['reviews'] = Review::with(['user'])->where('product_id',$id)->get();
        $n['quality_rating'] = $n['data']->qualityRatting();
        // dd($n);


        // related product collection
        $n['related_products'] = Product::where('cat_id',$n['data']->cat_id)->get();

        return view('frontend.product_details', $n);
    }

    public function review(Request $req){
        $insert = new Review();
        $insert->product_id = $req->product_id;
        $insert->user_id = Auth::user()->id;
        $insert->quality = $req->quality_rating;
        $insert->price = $req->price_rating;
        $insert->comment = $req->comment;
        $insert->save();
        return back()->with('review','Review added successfully');
    }

    public function page($title){
        $n['page'] = Page::where('title',$title)->first();
        return view('frontend.page',$n);
    }

}
