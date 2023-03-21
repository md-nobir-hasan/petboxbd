@extends('frontend.layouts.app')
@push('custom-css')
    <style>
        .product-image {
            max-height: 100px;
        }

        #cart_mobile a {
            color: black;
        }
        .with-discount{
            text-decoration: line-through;
        }
    </style>
@endpush
@section('page_conent')

    <div class="">
        <div class="p-top-15">
            {{-- Main banner  --}}
            <div id="carouselExampleIndicators" class="carousel slide mt-2" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    @foreach($sliders as $slider)
                        <div class="carousel-item @if($loop->first) active @endif">
                            <img src="{{ asset($slider->image) }}" class="d-block w-100" alt="...">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="container title-style-1 why_chooose_1" style="margin-top: 110px;">
                <div class="block-about-us block">
                    <div class="block-title"><strong class="top_title">Why Choose Us</strong>
                        <div class="posttext">Our food does not contain artificial preservatives, so it must be kept frozen to avoid expiration ahead of time.</div>
                    </div>
                    <div class="block-content content_block1">
                        <div class="inner-content">
                            <div class="col-left-content">
                                <div class="item item1 wow fadeInLeft" data-wow-duration="0.3s" data-wow-delay="0.3s" style="visibility: visible; animation-duration: 0.3s; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                    <div class="image"><img src="http://magento2.magentech.com/themes/sm_petshop/pub/media/wysiwyg/icon/icon-1.png" alt=""></div>
                                    <div class="info">
                                        <h3>Healthy PET NUTRITIONs</h3>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
                                    </div>
                                </div>
                                <div class="item item2 wow fadeInLeft" data-wow-duration="0.3s" data-wow-delay="0.6s" style="visibility: visible; animation-duration: 0.3s; animation-delay: 0.6s; animation-name: fadeInLeft;">
                                    <div class="image"><img src="http://magento2.magentech.com/themes/sm_petshop/pub/media/wysiwyg/icon/icon-2.png" alt=""></div>
                                    <div class="info">
                                        <h3>NATURAL PREBIOTIC FIBER</h3>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
                                    </div>
                                </div>
                                <div class="item item3 wow fadeInLeft" data-wow-duration="0.3s" data-wow-delay="0.9s" style="visibility: visible; animation-duration: 0.3s; animation-delay: 0.9s; animation-name: fadeInLeft;">
                                    <div class="image"><img src="http://magento2.magentech.com/themes/sm_petshop/pub/media/wysiwyg/icon/icon-3.png" alt=""></div>
                                    <div class="info">
                                        <h3>Modern pet toy</h3>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-center-content d-none d-xl-block wow zoomIn" data-wow-duration="0.3s" data-wow-delay="1.1s" style="visibility: visible; animation-duration: 0.3s; animation-delay: 1.1s; animation-name: zoomIn;"><img src="http://magento2.magentech.com/themes/sm_petshop/pub/media/wysiwyg/banner/about-center.jpg" alt="">
                                <div class="info-contact">
                                    <h3>Hotline Contact</h3>
                                    <h2>1-800-619-746</h2>
                                </div>
                            </div>
                            <div class="col-right-content">
                                <div class="item item4 wow fadeInRight" data-wow-duration="0.3s" data-wow-delay="0.3s" style="visibility: visible; animation-duration: 0.3s; animation-delay: 0.3s; animation-name: fadeInRight;">
                                    <div class="image"><img src="http://magento2.magentech.com/themes/sm_petshop/pub/media/wysiwyg/icon/icon-4.png" alt=""></div>
                                    <div class="info">
                                        <h3>Quality &amp; Safety</h3>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
                                    </div>
                                </div>
                                <div class="item item5 wow  fadeInRight" data-wow-duration="0.3s" data-wow-delay="0.6s" style="visibility: visible; animation-duration: 0.3s; animation-delay: 0.6s; animation-name: fadeInRight;">
                                    <div class="image"><img src="http://magento2.magentech.com/themes/sm_petshop/pub/media/wysiwyg/icon/icon-5.png" alt=""></div>
                                    <div class="info">
                                        <h3>Happy Pets</h3>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
                                    </div>
                                </div>
                                <div class="item item6 wow fadeInRight" data-wow-duration="0.3s" data-wow-delay="0.9s" style="visibility: visible; animation-duration: 0.3s; animation-delay: 0.9s; animation-name: fadeInRight;">
                                    <div class="image"><img src="http://magento2.magentech.com/themes/sm_petshop/pub/media/wysiwyg/icon/icon-6.png" alt=""></div>
                                    <div class="info">
                                        <h3>Positive Reviews</h3>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--<div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="card mb-3 rounded-0" style="">
                                <div class="row g-0">
                                    <a href="" class="col-2 m-auto text-center choose_icon">
                                        <img src="http://magento2.magentech.com/themes/sm_petshop/pub/media/wysiwyg/icon/icon-3.png" class="img-fluid rounded-start" alt="...">
                                    </a>

                                    <div class="col-10">
                                        <div class="card-body">
                                            <h3>Positive Reviews</h3>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="card mb-3 rounded-0" style="">
                                <div class="row g-0">
                                    <a href="" class="col-2 m-auto text-center choose_icon">
                                        <img src="http://magento2.magentech.com/themes/sm_petshop/pub/media/wysiwyg/icon/icon-3.png" class="img-fluid rounded-start" alt="...">
                                    </a>

                                    <div class="col-10">
                                        <div class="card-body">
                                            <h3>Positive Reviews</h3>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>--}}

                </div>
            </div>


            <div class="wrapper-container title-style-1 why_chooose_2" style="margin-top: 110px;">
                <div class="block-about-us block">
                    <div class="block-title"><strong class="top_title">Why Choose Us</strong>
                        <div class="posttext">Our food does not contain artificial preservatives, so it must be kept frozen to avoid expiration ahead of time.</div>
                    </div>


                    <div class="block-content">
                        <div class="inner-content">
                            <div class="col-right-content">
                                <div class="item item1 wow fadeInLeft" data-wow-duration="0.3s" data-wow-delay="0.3s" style="visibility: visible; animation-duration: 0.3s; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                    <div class="image"><img src="http://magento2.magentech.com/themes/sm_petshop/pub/media/wysiwyg/icon/icon-1.png" alt=""></div>
                                    <div class="info">
                                        <h3>Healthy PET NUTRITIONs</h3>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
                                    </div>
                                </div>
                                <div class="item item5 wow  fadeInRight" data-wow-duration="0.3s" data-wow-delay="0.6s" style="visibility: visible; animation-duration: 0.3s; animation-delay: 0.6s; animation-name: fadeInRight;">
                                    <div class="image"><img src="http://magento2.magentech.com/themes/sm_petshop/pub/media/wysiwyg/icon/icon-5.png" alt=""></div>
                                    <div class="info">
                                        <h3>NATURAL PREBIOTIC FIBER</h3>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
                                    </div>
                                </div>
                                <div class="item item6 wow fadeInRight" data-wow-duration="0.3s" data-wow-delay="0.9s" style="visibility: visible; animation-duration: 0.3s; animation-delay: 0.9s; animation-name: fadeInRight;">
                                    <div class="image"><img src="http://magento2.magentech.com/themes/sm_petshop/pub/media/wysiwyg/icon/icon-6.png" alt=""></div>
                                    <div class="info">
                                        <h3>Modern pet toy</h3>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
                                    </div>
                                </div>
                            </div>


                            <div class="col-right-content">
                                <div class="item item4 wow fadeInRight" data-wow-duration="0.3s" data-wow-delay="0.3s" style="visibility: visible; animation-duration: 0.3s; animation-delay: 0.3s; animation-name: fadeInRight;">
                                    <div class="image"><img src="http://magento2.magentech.com/themes/sm_petshop/pub/media/wysiwyg/icon/icon-4.png" alt=""></div>
                                    <div class="info">
                                        <h3>Quality & Safety</h3>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
                                    </div>
                                </div>
                                <div class="item item5 wow  fadeInRight" data-wow-duration="0.3s" data-wow-delay="0.6s" style="visibility: visible; animation-duration: 0.3s; animation-delay: 0.6s; animation-name: fadeInRight;">
                                    <div class="image"><img src="http://magento2.magentech.com/themes/sm_petshop/pub/media/wysiwyg/icon/icon-5.png" alt=""></div>
                                    <div class="info">
                                        <h3>Happy Pets</h3>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
                                    </div>
                                </div>
                                <div class="item item6 wow fadeInRight" data-wow-duration="0.3s" data-wow-delay="0.9s" style="visibility: visible; animation-duration: 0.3s; animation-delay: 0.9s; animation-name: fadeInRight;">
                                    <div class="image"><img src="http://magento2.magentech.com/themes/sm_petshop/pub/media/wysiwyg/icon/icon-6.png" alt=""></div>
                                    <div class="info">
                                        <h3>Positive Reviews</h3>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{--<div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="card mb-3 rounded-0" style="">
                                <div class="row g-0">
                                    <a href="" class="col-2 m-auto text-center choose_icon">
                                        <img src="http://magento2.magentech.com/themes/sm_petshop/pub/media/wysiwyg/icon/icon-3.png" class="img-fluid rounded-start" alt="...">
                                    </a>

                                    <div class="col-10">
                                        <div class="card-body">
                                            <h3>Positive Reviews</h3>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="card mb-3 rounded-0" style="">
                                <div class="row g-0">
                                    <a href="" class="col-2 m-auto text-center choose_icon">
                                        <img src="http://magento2.magentech.com/themes/sm_petshop/pub/media/wysiwyg/icon/icon-3.png" class="img-fluid rounded-start" alt="...">
                                    </a>

                                    <div class="col-10">
                                        <div class="card-body">
                                            <h3>Positive Reviews</h3>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>--}}


                </div>
            </div>

            {{--Most popular category show--}}
            <div class="wrapper-container" style="margin-top: 100px;">
                <div class="listingtab-style title-style-1" style="margin-bottom: 50px;">
                    <div id="listingtabs_0" class="block sm-listing-tabs slider">
                        <div class="block-title">
                            <strong>Most popular category</strong>
                            <div class="posttext">
                                Our food does not contain artificial preservatives, so it must be kept frozen to avoid expiration ahead of time.
                            </div>
                        </div>
                        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-6 g-3">
                            @forelse($categories as $category)
                                <div class="col rounded-circle py-3">
                                    <a href="{{ route('category', [$category->id]) }}" class="rounded-circle">
                                        <div class="card bg-dark text-white border rounded-circle cat-div text-center" style="border: #e7e7e7;">
                                            <img src="/{{ $category->img }}" class="card-img rounded-circle" alt="{{ $category->title }}">
                                            <div class="card-img-overlay ">
                                                <h5 class="card-title text-white cat-title"><strong style="font-size: 18px !important;">{{ $category->title }}</strong></h5>
                                                <button class="btn btn-sm shop-now" style="color: #0052b1;"><i class="fa-solid fa-basket-shopping"></i> Shop Now</button>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @empty
                                @if (isset($category))
                                    <p class="w-100 text-center">There are no category</p>
                                @else
                                    <p class="w-100 text-center">There are no products</p>
                                @endif
                            @endforelse
                        </div>
                        <div class="text-center mt-3 py-2">
                            <a href="{{ asset('all_category') }}" class="btn btn-sm"><i class="fa-sharp fa-solid fa-list-check"></i> Many more...</a>
                        </div>
                    </div>
                </div>
            </div>

            {{--// New product --}}
            @if (count($new_product))
                <div class="wrapper-container" style="margin-top: 100px;">
                    <div class="listingtab-style title-style-1" style="margin-bottom: 50px;">
                        <div id="listingtabs_0" class="block sm-listing-tabs slider">
                            <div class="block-title">
                                <strong>New Arrival</strong>
                                {{-- <div class="posttext">
                                    Our food does not contain artificial preservatives, so it must be kept frozen to avoid expiration ahead of time.
                                </div> --}}
                            </div>
                            @if(count($banners1))
                            <div class="banner-image mb-3" style="">
                                <a class="banner" title="Banner Image" href="#">
                                    <img class="mark-lazy" src="{{$banners1->image}}" alt="">
                                </a>
                            </div>
                            @endif
                            <!---- Featired product -->
                            <section id="featured-product">
                                <div class="">
                                    <!--- Owl carousel -->
                                    <div class="owl-carousel owl-theme row cols-2 cols-md-4 cols-lg-6">
                                        @forelse($new_product as $product)
                                            <div class="item col pb-4 pt-1 border m-2">
                                                <div class="product-div font-rale">
                                                    <a href="{{ route('product_details', [$product->id]) }}">
                                                        <img class="img-fluid img{{ $product->id }}" src='{{ asset("$product->photo") }}' alt="{{ $product->title }}" title="{{ $product->title }}">
                                                        <h6 class="text-center title{{ $product->id }}">{{ $product->title }}</h6>
                                                    </a>
                                                    <div class="text-center">
                                                        <div class="rating text-warning font-size-12">
                                                            <span><i class="fas fa-star"></i></span>
                                                            <span><i class="fas fa-star"></i></span>
                                                            <span><i class="fas fa-star"></i></span>
                                                            <span><i class="fas fa-star"></i></span>
                                                            <span><i class="far fa-star"></i></span>
                                                        </div>
                                                        <div class="price py-2">
                                                            @if($product->discount == 0.00)
                                                                <span class="regular text-danger">৳</span><span class="text-danger regular-price price{{ $product->id }}">{{$product->price }}</span>
                                                                <span class="special m-0"></span><span style="display: none;" class="dis-price dis-price{{ $product->id }}" style="text-decoration: line-through">{{$product->price - ($product->discount ?? 0)}}</span>
                                                            @else
                                                                <span class="special regular m-0 text-danger">৳</span><span class="text-danger regular-price price{{ $product->id }}">{{$product->price }}</span>
                                                                <span class="" style="text-decoration: line-through;">৳</span><span class="dis-price dis-price{{ $product->id }}" style="text-decoration: line-through">{{$product->price - ($product->discount ?? 0) }}</span>
                                                            @endif
                                                        </div>
                                                        <a href="" class="btn btn-sm nadd-to-cart" data-value="{{ $product->id }}">
                                                            <i class="fa fa-cart-plus"></i><span> Add to Cart</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                    <!--- Owl carousel -->
                                </div>
                            </section>
                            <!---- New Phones -->

                        </div>
                    </div>
                </div>
            @endif

            {{--// Featured product / Default Products--}}
            @if (count($products))
                <div class="wrapper-container" style="margin-top: 100px;">
                    <div class="listingtab-style title-style-1" style="margin-bottom: 50px;">
                        <div id="listingtabs_0" class="block sm-listing-tabs slider">
                            <div class="block-title">
                                <strong>FEATURED PRODUCTS</strong>
                                {{-- <div class="posttext">
                                    Our food does not contain artificial preservatives, so it must be kept frozen to avoid expiration ahead of time.
                                </div> --}}
                            </div>
                            @if(count($banners2))
                            <div class="banner-image mb-3" style="">
                                <a class="banner" title="Banner Image" href="#">
                                    <img class="mark-lazy" src="{{$banners2->image}}" alt="">
                                </a>
                            </div>
                            @endif
                            <!---- Featired product -->
                            <section id="featured-product">
                                <div class="">
                                    <!--- Owl carousel -->
                                    <div class="owl-carousel owl-theme row cols-2 cols-md-4 cols-lg-6">
                                        @forelse($products as $product)
                                            <div class="item col pb-4 pt-1 border m-2">
                                                <div class="product-div font-rale">
                                                    <a href="{{ route('product_details', [$product->id]) }}">
                                                        <img class="img-fluid img{{ $product->id }}" src='{{ asset("$product->photo") }}' alt="{{ $product->title }}" title="{{ $product->title }}">
                                                        <h6 class="text-center title{{ $product->id }}">{{ $product->title }}</h6>
                                                    </a>
                                                    <div class="text-center">
                                                        <div class="rating text-warning font-size-12">
                                                            <span><i class="fas fa-star"></i></span>
                                                            <span><i class="fas fa-star"></i></span>
                                                            <span><i class="fas fa-star"></i></span>
                                                            <span><i class="fas fa-star"></i></span>
                                                            <span><i class="far fa-star"></i></span>
                                                        </div>
                                                        <div class="price py-2">
                                                            @if($product->discount == 0.00)
                                                                <span class="regular text-danger">৳</span><span class="text-danger regular-price price{{ $product->id }}">{{ $product->price }}</span>
                                                                <span class="special m-0"></span><span style="display: none;" class="dis-price dis-price{{ $product->id }}" style="text-decoration: line-through">{{$product->price - ($product->discount ?? 0) }}</span>
                                                            @else
                                                                <span class="special regular m-0 text-danger">৳</span><span class="text-danger regular-price price{{ $product->id }}">{{$product->price }}</span>
                                                                <span class="" style="text-decoration: line-through;">৳</span><span class="dis-price dis-price{{ $product->id }}" style="text-decoration: line-through">{{$product->price - ($product->discount ?? 0) }}</span>
                                                            @endif
                                                        </div>
                                                        <a href="" class="btn btn-sm nadd-to-cart" data-value="{{ $product->id }}">
                                                            <i class="fa fa-cart-plus"></i><span> Add to Cart</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                    <!--- Owl carousel -->
                                </div>
                            </section>
                            <!---- New Phones -->

                        </div>
                    </div>
                </div>
            @endif

                {{--// Best selling product--}}
                @if (count($best_selling_prouct))
                <div class="wrapper-container" style="margin-top: 100px;">
                    <div class="listingtab-style title-style-1" style="margin-bottom: 50px;">
                        <div id="listingtabs_0" class="block sm-listing-tabs slider">
                            <div class="block-title">
                                <strong>BEST SELLING PRODUCTS</strong>
                                {{-- <div class="posttext">
                                    Our food does not contain artificial preservatives, so it must be kept frozen to avoid expiration ahead of time.
                                </div> --}}
                            </div>
                            {{-- Banner for Features selling product --}}
                            {{-- <div class="banner-image mb-3" style="">
                                <a class="banner" title="Banner Image" href="#">
                                    <img class="mark-lazy" src="{{$banners1->image}}" alt="">
                                </a>
                            </div> --}}
                            <!---- Featired product -->
                            <section id="best-selling-product">
                                <div class="">
                                    <!--- Owl carousel -->
                                    <div class="owl-carousel owl-theme row cols-2 cols-md-4 cols-lg-6">
                                        @forelse($best_selling_prouct as $product)
                                            <div class="item col pb-4 pt-1 border m-2">
                                                <div class="product-div font-rale">
                                                    <a href="{{ route('product_details', [$product->id]) }}">
                                                        <img class="img-fluid img{{ $product->id }}" src='{{ asset("$product->photo") }}' alt="{{ $product->title }}" title="{{ $product->title }}">
                                                        <h6 class="text-center title{{ $product->id }}">{{ $product->title }}</h6>
                                                    </a>
                                                    <div class="text-center">
                                                        <div class="rating text-warning font-size-12">
                                                            <span><i class="fas fa-star"></i></span>
                                                            <span><i class="fas fa-star"></i></span>
                                                            <span><i class="fas fa-star"></i></span>
                                                            <span><i class="fas fa-star"></i></span>
                                                            <span><i class="far fa-star"></i></span>
                                                        </div>
                                                        <div class="price py-2">
                                                            @if($product->discount == 0.00)
                                                                <span class="regular text-danger">৳</span><span class="text-danger regular-price price{{ $product->id }}">{{$product->price }}</span>
                                                                <span class="special m-0"></span><span style="display: none;" class="dis-price dis-price{{ $product->id }}" style="text-decoration: line-through">{{$product->price - ($product->discount ?? 0) }}</span>
                                                            @else
                                                                <span class="special regular m-0 text-danger">৳</span><span class="text-danger regular-price price{{ $product->id }}">{{$product->price }}</span>
                                                                <span class="" style="text-decoration: line-through;">৳</span><span class="dis-price dis-price{{ $product->id }}" style="text-decoration: line-through">{{$product->price - ($product->discount ?? 0) }}</span>
                                                            @endif
                                                        </div>
                                                        <a href="javascript:void(0)" class="btn btn-sm nadd-to-cart" data-value="{{ $product->id }}">
                                                            <i class="fa fa-cart-plus"></i><span> Add to Cart</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                    <!--- Owl carousel -->
                                </div>
                            </section>
                            <!---- New Phones -->

                        </div>
                    </div>
                </div>
            @endif



            {{--Timmer Product show--}}
            <div class="wrapper-container" style="margin-top: 100px;">
                <div class="listingtab-style title-style-1" style="margin-bottom: 50px;">    <div id="listingtabs_0" class="block sm-listing-tabs slider">
                        <div class="block-title">
                            <strong>Hot Offers</strong>
                            <div class="posttext">
                                Our food does not contain artificial preservatives, so it must be kept frozen to avoid expiration ahead of time.
                            </div>
                        </div>
                        <!---- New Phones -->
                        <section id="new-phones">
                            <div class="">
                                <!--- Owl carousel -->
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3 mb-md-0 mb-lg-0">
                                        <div class="pb-4 pt-1 border">
                                            <div class="product font-rale">
                                                <a href="#">
                                                    <img src="product/mobile.jpg" alt="products" class="img-fluid">
                                                    <h6 class="text-center">Samsung Galaxy 10</h6>
                                                </a>
                                                <div class="text-center">
                                                    <div class="rating text-warning font-size-12">
                                                        <span><i class="fas fa-star"></i></span>
                                                        <span><i class="fas fa-star"></i></span>
                                                        <span><i class="fas fa-star"></i></span>
                                                        <span><i class="fas fa-star"></i></span>
                                                        <span><i class="far fa-star"></i></span>
                                                    </div>
                                                    <div class="price py-2">
                                                        <span class="text-danger regular-price">$152</span> <span class="dis-price" style="text-decoration: line-through">$152</span>
                                                    </div>
                                                    <button type="submit" class="btn btn-sm btn-warning font-size-12"><i class="fa-solid fa-cart-shopping"></i> Add Cart</button>

                                                    <div class="time-countdown-slide px-4">
                                                        <div class="time-wrapper">
                                                            <div class="time-label clearfix">
                                                                <div class="stock-qty">
                                                                    Availability:<span>100</span>
                                                                </div>

                                                                <div class="time-left">
                                                                    Time left: <span>184day(s)</span>
                                                                </div>
                                                            </div>

                                                            <div class="time-ranger">
                                                                <div class="time-pass" style="width: 49.58904109589%">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div>
                                                            <div id="simple-timer"></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-6 col-sm-12">


                                    </div>
                                </div>

                                <!--- Owl carousel -->
                            </div>
                        </section>
                        <!---- New Phones -->
                    </div>
                </div>
            </div>


            <!--- Brand image show -->
            <section id="brand">
                <div class="container" style="margin-top: 100px;">
                    <!--- Owl carousel -->
                    <div class="owl-carousel owl-theme">
                        @foreach ($brands as $brand)
                            <div class="item py-2">
                                <div class="product font-rale">
                                    <a href="javascript:void()"><img src="{{asset($brand->img)}}" alt="products" class="img-fluid"></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--- Owl carousel -->
                </div>
            </section>

        </div>
    </div>
@endsection
@push('custom-js')
<script>
    $(document).ready(function() {
        DBaddToCart();
    });

</script>
@endpush
