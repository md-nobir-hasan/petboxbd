<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductGallery;
use App\Models\Brand;
use App\Models\ImageGallery;
use App\Models\Payment;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\Shipping;
use App\Models\PaColor;
use App\Models\PaSize;
use App\Models\Subcat;
use Faker\Core\Color;
use Illuminate\Support\Facades\Artisan;

class ProductController extends Controller
{
    public $checking_info;

    public function __construct() {
        $this->middleware(['auth',"check:Product"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!check('product')->show){
            return redirect()->back();
        }
        $products=Product::orderBy('id','desc')->get();

        return view('backend.pages.product.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!check('product')->add){
            return redirect()->back();
        }
        $n['brands']=Brand::get();
        $n['category']=Category::all();
        $n['colors']=ProductColor::all();
        $n['sizes']=ProductSize::all();

        return view('backend.pages.product.create',$n);
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
        if(!check('product')->add){
            return redirect()->back();
        }
        // dd($request->all());
            $insert = new Product();
            $insert->title = $request->title;
            $insert->sku = $request->sku;
            $insert->summary = $request->summary;
            $insert->description = $request->description;
            $insert->cat_id = $request->cat_id;
            $insert->subcat_id = $request->sub_cat_id;
            $insert->price = $request->price;
            $insert->discount = $request->discount;
            $insert->brand_id = $request->brand_id;
            $insert->condition = $request->condition ?? 'default';
            $insert->stock = $request->stock;
            $insert->status = $request->status;
            // if($request->time_from){
                $insert->time_to = $request->time_to;
                // dd($request->all());
            // }
            $insert->photo = ProductGallery::orderBy('id','desc')->first()->imageGallery->img;
            $insert->slug = $request->title;
            $insert->is_featured = $request->input('is_featured',0);
            $insert->save();

            // $product_gallery = new ProductGallery();
            // $product_gallery->product_id = $insert->id;
            // $product_gallery->gallery_id = $imge_gallery->id;
            // $product_gallery->color_id = $request->color;
            // $product_gallery->size_id = $request->size;
            // $product_gallery->active = 'yes';
            // $product_gallery->save();
            //===========  color size na thakle ai code
        //   if ($files = $request->file('product_gallery')){
        //     foreach ($files as $file){
        //         $image_name = md5(rand(1000, 10000));
        //         $ext = strtolower($file->getClientOriginalExtension());
        //         $image_full_name = 'new'.$image_name.'.'.$ext;
        //         $file->move(public_path('product'), $image_full_name);
        //         $image_path = 'product/'.$image_full_name;
        //         $insert_gallery = new ProductGallery();
        //         $insert_gallery->img = $image_path;
        //         $insert_gallery->product_id = $insert->id;
        //         $insert_gallery->save();
        //     }
        // }

        // color size thakle ai code
        if($request->pa_color_id){
            foreach($request->pa_color_id as $val){
                $pc_insert = PaColor::find($val);
                $pc_insert->product_id = $insert->id;
                $pc_insert->save();
            }
        }
        if($request->pa_size_id){
            foreach($request->pa_size_id as $val){
                $ps_insert = PaSize::find($val);
                $ps_insert->product_id = $insert->id;
                $ps_insert->save();
            }
        }
        if($request->galleryphoto){
            foreach ($request->galleryphoto as $id){
                $insert_gallery = ProductGallery::find($id);
                $insert_gallery->product_id = $insert->id;
                $insert_gallery->save();
            }
        }

        if($insert){
            request()->session()->flash('success','Product Successfully added');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('product.index');
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
        if(!check('product')->edit){
            return redirect()->back();
        }
        $n['brands']=Brand::get();
        $n['product']=Product::findOrFail($id);
        $n['categories']=Category::all();
        $n['sub_cats']=Subcat::where('cat_id',$n['product']->cat_id)->orderBy('id','desc')->get();
        // $n['products']=Product::all();
        $n['colors']=ProductColor::all();
        $n['sizes']=ProductSize::all();
        // return $items;
        return view('backend.pages.product.edit',$n);
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
        if(!check('product')->edit){
            return redirect()->back();
        }
        $update=Product::findOrFail($id);
        $update->title = $request->title;
        $update->sku = $request->sku;
        $update->summary = $request->summary;
        $update->description = $request->description;
        $update->cat_id = $request->cat_id;
        $update->subcat_id = $request->sub_cat_id;
        $update->price = $request->price;
        $update->discount = $request->discount;
        $update->brand_id = $request->brand_id;
        $update->condition = $request->condition ?? 'default';
        $update->stock = $request->stock;
        $update->status = $request->status;
        $update->photo = ProductGallery::orderBy('id','desc')->first()->imageGallery->img;
        $update->slug = $request->title;
        $update->is_featured = $request->input('is_featured',0);
        $update->save();

    // color size thakle ai code
    if($request->pa_color_id){
        foreach($request->pa_color_id as $val){
            $pc_insert = PaColor::find($val);
            $pc_insert->product_id = $update->id;
            $pc_insert->save();
        }
    }
    if($request->pa_size_id){
        foreach($request->pa_size_id as $val){
            $ps_insert = PaSize::find($val);
            $ps_insert->product_id = $update->id;
            $ps_insert->save();
        }
    }
    if($request->galleryphoto){
        foreach ($request->galleryphoto as $id){
            $insert_gallery = ProductGallery::find($id);
            $insert_gallery->product_id = $update->id;
            $insert_gallery->save();
        }
    }

    if($update){
        request()->session()->flash('success','Product Successfully updated');
    }
    else{
        request()->session()->flash('error','Please try again!!');
    }
    return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!check('product')->delete){
            return redirect()->back();
        }
        $product=Product::findOrFail($id);
        $product_gallery = ProductGallery::where('product_id',$id)->get();
        foreach($product_gallery as $value){
            if(file_exists($value->img)){
                unlink($value->img);
            }

            $value->delete();
        }
        $status=$product->delete();

        if($status){
            request()->session()->flash('success','Product successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting product');
        }
        return redirect()->route('product.index');
    }



    // Show gallery image code
    public function show_gallery($id){
        $data = Product::with(['productGallery','productGallery.imageGallery'])->find($id);

        return view('backend.pages.product.show_gallery', compact('data'));
    }
}
