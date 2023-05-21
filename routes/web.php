<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GoogleTagController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PixelTagController;
use App\Http\Controllers\ProductColorController;
use App\Http\Controllers\ProductSizeController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyDetailsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\SubcatController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ImageGalleryController;
use App\Http\Controllers\MainKeyController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\WishlishtController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//frontend route
Route::get('/', [FrontendController::class,'index'])->name('home');
Route::get('/ajax-fetch', [AjaxController::class,'ajaxFetch'])->name('ajax-fetch');

Route::get('/redirect', [FrontendController::class, 'redirect']);

Route::get('/category-product/{id}', [FrontendController::class,'categoryWiseShow'])->name('category');
Route::get('/product/sub-category/{id}/{id2}', [FrontendController::class,'subcatWiseShow'])->name('product.subcat');
Route::post('single/order', [FrontendController::class,'store'])->name('single.store');
Route::get('/all_category', [FrontendController::class,'all_category'])->name('all-category');
Route::get('/all_product', [FrontendController::class,'all_product'])->name('all_product');
Route::post('order/store',[OrderController::class,'store'])->name('order.store');
Route::get('product/fetch/{id}',[FrontendController::class,'productFetch'])->name('product.fetch');
Route::get('order/thank-you-page/{order}',[OrderController::class,'thanks'])->name('order.thanks');
Route::get('order/checkout',[OrderController::class,'checkout'])->name('checkout');
Route::get('/product_details/{id}',[FrontendController::class,'product_details'])->name('product_details');
Route::get('/product_details/{id}/#contact',[FrontendController::class,'product_details'])->name('product_details');
Route::post('/review',[FrontendController::class,'review'])->name('review');

//Pages
Route::get('/pages/{title}',[FrontendController::class,'page'])->name('page');
//Add to Cart
Route::resource('addtocart',AddToCartController::class);

//Wishlist
Route::resource('wishlist',WishlishtController::class);
 //end frontend route



// Route for  both
   //Ajax CURD Option
   Route::controller(AjaxController::class)->prefix('ajax')->name('ajax.')->group(function(){
    Route::get('/subcat','subcatFetch')->name('subcat');
    Route::post('/insert','store')->name('store');
    Route::post('/single/insert','singleStore')->name('singlestore');
    Route::post('/index','index')->name('index');
    Route::post('/edit','edit')->name('edit');
    Route::post('/delete','delete')->name('delete');
});


Route::group(['middleware'=>['auth']],function() {
    // Admin home
    Route::get('/admin', [HomeController::class, 'home'])->name('admin');

    //company details
    Route::get('company-details/index', [CompanyDetailsController::class, 'create'])->name('company-details.index');
    Route::get('company-details/index', [CompanyDetailsController::class, 'create'])->name('company-details.create');
    Route::post('company-details/store', [CompanyDetailsController::class, 'store'])->name('company-details.store');
    Route::get('company-details/edit/{id}', [CompanyDetailsController::class, 'edit'])->name('company-details.edit');
    Route::put('company-details/update', [CompanyDetailsController::class, 'update'])->name('company-details.update');
    Route::post('company-details/delete/{id}', [CompanyDetailsController::class, 'destroy'])->name('company-details.destroy');

    //Category Mangement
    Route::group(['as' => 'category.', 'prefix' => 'category'], function () {
        Route::get('/index', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    //Sub-category Mangement
    Route::group(['as' => 'subcat.', 'prefix' => 'subcat'], function () {
        Route::get('/index', [SubcatController::class, 'index'])->name('index');
        Route::get('/create', [SubcatController::class, 'create'])->name('create');
        Route::post('/store', [SubcatController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SubcatController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [SubcatController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [SubcatController::class, 'destroy'])->name('destroy');
    });


    //Brand Mangement
    Route::group(['as' => 'brand.', 'prefix' => 'brand'], function () {
        Route::get('/index', [BrandController::class, 'index'])->name('index');
        Route::get('/create', [BrandController::class, 'create'])->name('create');
        Route::post('/store', [BrandController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [BrandController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [BrandController::class, 'destroy'])->name('destroy');
    });

    //Shippin Mangement
    Route::group(['as' => 'shipping.', 'prefix' => 'shipping'], function () {
        Route::get('/index', [ShippingController::class, 'index'])->name('index');
        Route::get('/create', [ShippingController::class, 'create'])->name('create');
        Route::post('/store', [ShippingController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ShippingController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [ShippingController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [ShippingController::class, 'destroy'])->name('destroy');
    });

    //PRODUCT MANAGEMENT
    Route::group(['as' => 'product.', 'prefix' => 'product'], function () {
        Route::get('/index', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('destroy');
        Route::get('/show_gallery/{id}', [ProductController::class, 'show_gallery'])->name('product_gallery');

    });

    //Order Management
    Route::group(['as' => 'order.', 'prefix' => 'order'], function () {
        Route::get('/index', [OrderController::class, 'index'])->name('index');
        Route::get('/create', [OrderController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [OrderController::class, 'update'])->name('update');
        Route::get('/trash', [OrderController::class, 'trash'])->name('trash');
        Route::get('/delete/{id}', [OrderController::class, 'delete'])->name('delete');
        Route::get('/restore/{id}', [OrderController::class, 'restore'])->name('restore');
        Route::get('/destroy/{id}', [OrderController::class, 'destroy'])->name('destroy');
        Route::get('view/{order_number}', [OrderController::class, 'view'])->name('view');

    });

    //Payment system
    Route::group(['as' => 'payment.', 'prefix' => 'payment'], function () {

        Route::get('/index', [PaymentController::class, 'index'])->name('index');
        Route::get('/create', [PaymentController::class, 'create'])->name('create');
        Route::post('/insert', [PaymentController::class, 'insert'])->name('insert');
        Route::get('/payment_delete/{id}', [PaymentController::class, 'payment_delete'])->name('payment_delete');
        Route::get('/edite/{id}', [PaymentController::class, 'edite'])->name('edite');
        Route::post('/update/{id}', [PaymentController::class, 'update'])->name('update');

    });

    //Order Status
    Route::group(['as' => 'order-status.', 'prefix' => 'order-status'], function () {
        Route::get('/index', [OrderStatusController::class, 'index'])->name('index');
        Route::get('/create', [OrderStatusController::class, 'create'])->name('create');
        Route::post('/store', [OrderStatusController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [OrderStatusController::class, 'edit'])->name('edit');
        Route::patch('/update', [OrderStatusController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [OrderStatusController::class, 'destroy'])->name('destroy');
        Route::get('/ajax', [OrderStatusController::class, 'ajax'])->name('ajax');
        Route::get('/order-status-assign', [OrderStatusController::class, 'OrderStatusAssign'])->name('order-status-assign');
    });

    //Order Status
    Route::group(['as' => 'customer.', 'prefix' => 'customer'], function (){
        Route::get('/customer', [ContactController::class, 'customer'])->name('customer');
        Route::get('/view/{id}', [ContactController::class, 'view'])->name('view');
        Route::get('/delete/{id}', [ContactController::class, 'delete'])->name('delete');
    });

    //Slider images
    Route::group(['as' => 'slider.', 'prefix' => 'slider'], function (){
       Route::get('/index', [SliderController::class, 'index'])->name('index');
       Route::get('/create', [SliderController::class, 'create'])->name('create');
       Route::post('/store', [SliderController::class, 'store'])->name('store');
       Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('edit');
       Route::post('/update/{id}', [SliderController::class, 'update'])->name('update');
       Route::get('/destroy/{id}', [SliderController::class, 'destroy'])->name('destroy');
    });

    //Banner images
    Route::group(['as' => 'banner.', 'prefix' => 'banner'], function (){
        Route::get('/index', [BannerController::class, 'index'])->name('index');
        Route::get('/create', [BannerController::class, 'create'])->name('create');
        Route::post('/store', [BannerController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BannerController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [BannerController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [BannerController::class, 'destroy'])->name('destroy');
    });

    //Product size
    Route::group(['as'  => 'size.', 'prefix' => 'size'], function (){
        Route::get('/index', [ProductSizeController::class, 'index'])->name('index');
        Route::get('/create', [ProductSizeController::class, 'create'])->name('create');
        Route::post('/store', [ProductSizeController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductSizeController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ProductSizeController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [ProductSizeController::class, 'destroy'])->name('destroy');
    });

    //Product color
    Route::group(['as'  => 'color.', 'prefix' => 'color'], function (){
        Route::get('/index', [ProductColorController::class, 'index'])->name('index');
        Route::get('/create', [ProductColorController::class, 'create'])->name('create');
        Route::post('/store', [ProductColorController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductColorController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ProductColorController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [ProductColorController::class, 'destroy'])->name('destroy');
    });

    //Image Management
    Route::group(['as'  => 'img.', 'prefix' => 'image'], function (){
        Route::get('/index', [ImageGalleryController::class, 'index'])->name('index');
        Route::get('/create', [ImageGalleryController::class, 'create'])->name('create');
        Route::post('/store', [ImageGalleryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ImageGalleryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ImageGalleryController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [ImageGalleryController::class, 'destroy'])->name('destroy');
    });

    //Pixel tag
    Route::group(['as' => 'pixel.', 'prefix' => 'pixel'], function (){
        Route::get('/index', [PixelTagController::class, 'index'])->name('index');
        Route::get('/create', [PixelTagController::class, 'create'])->name('create');
        Route::post('/store', [PixelTagController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PixelTagController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [PixelTagController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [PixelTagController::class, 'destroy'])->name('destroy');
    });

    //Google tag
    Route::group(['as' => 'google.', 'prefix' => 'google'], function (){
        Route::get('/index', [GoogleTagController::class, 'index'])->name('index');
        Route::get('/create', [GoogleTagController::class, 'create'])->name('create');
        Route::post('/store', [GoogleTagController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [GoogleTagController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [GoogleTagController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [GoogleTagController::class, 'destroy'])->name('destroy');
    });

    //Page
    Route::resource('/page',PageController::class);
    //Setting
    Route::group(['as' => 'setting.', 'prefix' => 'setting'], function (){

        //Features
        Route::resource('features',FeatureController::class)->names([
             'index' => 'feature.index',
             'create' => 'feature.create',
             'edit' => 'feature.edit',
             'store' => 'feature.store',
             'update' => 'feature.update',
             'destroy' => 'feature.destroy',
             'show' => 'feature.show',
            ]);

        //Site Setting
        Route::resource('site-setting',SiteSettingController::class)->names([
             'index' => 'site.index',
             'create' => 'site.create',
             'edit' => 'site.edit',
             'store' => 'site.store',
             'update' => 'site.update',
             'destroy' => 'site.destroy',
             'show' => 'site.show',
            ]);

        Route::prefix('setup')->name('setup.')->group(function(){
            // Services
            Route::resource('services',ServiceController::class);

            // Main Keys
            Route::resource('mainKey',MainKeyController::class)->names([
                'index' => 'key.index',
                'create' => 'key.create',
                'edit' => 'key.edit',
                'store' => 'key.store',
                'update' => 'key.update',
                'destroy' => 'key.destroy',
                'show' => 'key.show',
               ]);
        });

        //role
         Route::group(['as' => 'role.', 'prefix' => 'role'], function (){
            Route::get('/index', [SettingController::class, 'roleIndex'])->name('index');
            Route::get('/create/{id?}', [SettingController::class, 'roleCreate'])->name('create');
            Route::post('/store', [SettingController::class, 'roleStore'])->name('store');
            Route::get('/destroy/{id}', [SettingController::class, 'roleDestroy'])->name('destroy');
        });

        //user
         Route::group(['as' => 'user.', 'prefix' => 'user'], function (){
            Route::get('/index', [SettingController::class, 'userIndex'])->name('index');
            Route::get('/create/{id?}', [SettingController::class, 'userCreate'])->name('create');
            Route::post('/store', [SettingController::class, 'userStore'])->name('store');
            Route::get('/destroy/{id}', [SettingController::class, 'userDestroy'])->name('destroy');
        });


    });

});

//Contact frontend code
Route::group(['as' => 'contact.', 'prefix' => 'contact'], function (){
    Route::post('/contact', [ContactController::class, 'contact'])->name('contact');
});


require __DIR__.'/auth.php';

