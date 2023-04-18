@extends('frontend.layouts.app')
@push('custom-css')
    <style>
        .product-image {
            max-height: 100px;
        }

        #cart_mobile a {
            color: black;
        }

        /*Product details page custome css code*/
        .cusom-btn {
            /* width: 40%; */
            border-radius: 0;
            margin-top: 18px;
        }

        .title-attr {
            margin-top: 0;
            margin-bottom: 0;
            color: black;
        }

        .btn-minus {
            cursor: pointer;
            font-size: 15px;
            display: flex;
            align-items: center;
            padding: 5px;
            padding-left: 10px;
            padding-right: 10px;
            border: 1px solid gray;
            border-radius: 2px;
            border-right: 0;

            color: white;
        }

        .btn-plus {
            cursor: pointer;
            font-size: 15px;
            display: flex;
            align-items: center;
            padding: 5px;
            padding-left: 10px;
            padding-right: 10px;
            border: 1px solid gray;
            border-radius: 2px;
            border-left: 0;

            color: white;
        }

        .btn-plus, .btn-minus:hover{

            color: white !important;
        }

        div.section>div {

            display: inline-flex;
        }

        div.section>div>input {
            margin: 0;
            padding-left: 5px;
            font-size: 15px;
            padding-right: 5px;
            max-width: 50%;
            text-align: center;
        }

        .attr,
        .attr2 {
            cursor: pointer;
            margin-right: 5px;
            height: 20px;
            font-size: 10px;
            padding: 2px;
            border: 1px solid gray;
            border-radius: 2px;
        }

        .attr.active,
        .attr2.active {
            border: 1px solid orange;
        }
        .submit-review-div{

        }
        .submit-review-btn{
            background: #f2f2f2;
            border: 1px solid #cdcdcd;
            color: #333;
            border-radius: 4px;

        }
        .ratting:hover{
            color: red;
        }

        @media (max-width: 426px) {
            .container {
                margin-top: 0px !important;
            }

            .container>.row {
                padding: 0 !important;
            }

            .container>.row>.col-xs-12.col-sm-5 {
                padding-right: 0;
            }

            .container>.row>.col-xs-12.col-sm-9>div>p {
                padding-left: 0 !important;
                padding-right: 0 !important;
            }

            .container>.row>.col-xs-12.col-sm-9>div>ul {
                padding-left: 10px !important;

            }

            .section {
                width: 104%;
            }

            .menu-items {
                padding-left: 0;
            }
        }

    </style>
@endpush
@section('page_conent')
    <div class="main-content-wrapper home-page">
        <div class="wrapper-container" style="padding-top: 140px !important;">
            <div class="">
                {{--<div class="row mt-5">
                    <div class="col-lg-5 item-photo">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-interval="false">

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src='{{ asset("$data->photo") }}' class="d-block w-100 img{{ $data->id }}"
                                        alt="...">
                                </div>

                                @php
                                    $id = $data->id;
                                    $image = DB::table('products')
                                        ->where('id', $id)
                                        ->first();
                                    $images = explode('|', $image->product_gallery);
                                @endphp

                                @foreach ($images as $image)
                                    <div class="carousel-item">
                                        <img src="{{ URL::to($image) }}" width="100%" height="225" alt="">
                                    </div>
                                @endforeach
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon prev_icon bg-dark" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon next_icon bg-dark" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                    <div class="col-lg-7" style="border:0px solid #808080">
                        <h4 class="title{{ $data->id }}">{{ $data->title }}</h4>
                        <h5 class="title-price">Product price</h5>
                        <h5 style="margin-top:0px; color: red; text-decoration: line-through; "
                            class="price{{ $data->id }}"> {{ $data->price }}৳</h5>
                        <h5 class="title-price">Discount price</h5>
                        <h5 style="margin-top:0px; color: blue;"> <span
                                class="dis-price{{ $data->id }}">{{ $data->price - $data->discount }}</span>৳</h5>
                        <h5 class="title-attr" style="margin-top:15px;">Stock</h5>
                        <div>
                            <p>{{ $data->stock }}</p>
                        </div>

                        <div class="col-4">
                            <div class="section">
                                <h5 class="title-attr mb-2">Quantity</h5>
                                <div class="d-flex">
                                    <div class="btn-minus btn btn-sm"><i class="fa-solid fa-minus"></i></div>
                                    <input value="1" />
                                    <div class="btn-plus btn btn-sm"><i class="fa-solid fa-plus"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-9 col-md-6 d-flex">
                            <button class="btn cusom-btn w-100 rounded add-to-cart" id="{{ $data->id }}"><i
                                    class="fa fa-cart-plus"></i> Add to card</button>
                            --}}{{-- <button class="btn cusom-btn btn-warning w-100 ms-2 rounded"><i
                                    class="fa fa-cart-plus"></i>Checkout</button> --}}{{--
                        </div>
                    </div>
                </div>--}}
{{-- <div class="text-danger">
    @if (Session::has('review'))
        {{ Session::get('review')}}
    @endif
</div> --}}

                <div class="row mt-5">
                    <div class="col-lg-5 item-photo">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-interval="false">
                            <div class="carousel-inner product-div">
                                @foreach ($data->productGallery as $image)
                                    <div class="carousel-item @if ($loop->first) active @endif">
                                        <img src="{{ asset($image->imageGallery->img) }}" width="100%" height="225" alt="">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                                    data-bs-slide="prev">
                                <span class="carousel-control-prev-icon prev_icon bg-dark" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                                    data-bs-slide="next">
                                <span class="carousel-control-next-icon next_icon bg-dark" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                    <div class="col-lg-7 product_dright pt-5 pt-lg-0" style="border:0px solid #808080">
                        <h3 class="pb-2">{{ $data->title }}</h3>
                        <div class="review my-2">
                            {{-- <div class="review my-2 ms-2"> --}}
                                {{-- <span class="me-2">Price</span> --}}
                                @if ($quality_rating == 1)
                                    <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                @endif
                                @if ($quality_rating == 2)
                                    <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                    <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                @endif
                                @if ($quality_rating == 3)
                                    <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                    <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                    <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                @endif
                                @if ($quality_rating == 4)
                                    <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                    <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                    <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                    <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                @endif
                                @if ($quality_rating == 5)
                                    <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                    <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                    <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                    <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                    <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                @endif
                            {{-- </div> --}}
                            <span class="mx-2">Review</span>
                            <span class="">|</span>
                            <span class="mx-2 rev_text">
                               <a href="{{asset('/product_details/2/#contact')}}">
                                <ul class="nav nav-tabs d-inline-block" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link border-none" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
                                            Add Your Review
                                        </button>
                                    </li>
                                </ul>
                               </a>
                            </span>
                        </div>
                        <div class="price price_box mb-1">

                            @if($data->discount == 0.00)
                                <span class="special regular m-0 text-danger">৳</span><span class="text-danger special regular-price price{{ $data->id }}">{{$data->price }}</span>
                                {{-- <span class="" style="text-decoration: line-through; display: none">৳</span><span style="display: none" class="dis-price dis-price{{ $data->id }}" style="text-decoration: line-through">{{$data->price - ($data->discount ?? 0) }}</span> --}}
                            @else
                                <span class="special regular m-0 text-danger">৳</span><span class="text-danger special regular-price price{{ $data->id }}">{{$data->price - ($data->discount ?? 0)}}</span>
                                <span class="" style="text-decoration: line-through;">৳</span><span class="dis-price dis-price{{ $data->id }}" style="text-decoration: line-through">{{$data->price  }}</span>
                            @endif

                        </div>
                        <hr>

                        <div class="sku_cat my-4">
                            <div class="mb-2">
                                <span>SKU: {{ $data->sku }}</span>
                            </div>
                            <div class="categories">
                                <span>Categories:</span> <br>
                                <span>Cat</span>,
                                <span>Bird</span>,
                                <span>Dog</span>,
                                <span>Dog</span>,
                                <span>Dog</span>,
                                <span>Dog</span>,
                            </div>
                        </div>
                        <hr>
                        <div class="short_description">
                            <p>{!! $data->summary !!}</p>
                        </div>
                        <div class="d-flex align-items-center qty_cart_wish">
                            <div>
                                <span class="me-2 qty_text">Qty</span>
                                <input class="qty_input" type="number" min="0" value="1">
                            </div>
                            <div class="mx-3">
                                <a href="javascript:void(0)" class="btn nadd-to-cart" data-value="{{ $data->id }}">
                                    <i class="fa fa-cart-plus"></i>&nbsp;<span> Add to Cart</span>
                                </a>
                            </div>
                            @if (serviceCheck('Wishlist'))
                                @php
                                $wish = $data->wishlistCheck()
                                @endphp

                                <div class="dwishlist" data-id="{{ $wish ? $wish->id : ''}}">
                                    <a href="javascript:void(0)">
                                        <span><i class="fa-solid fa-heart" style="color: #ffcc00;font-size: 30px;"></i></span>
                                    </a>
                                </div>

                                <div class="nwishlist" data-id="{{ $data->id }}">
                                    <a href="javascript:void(0)"><span><i class="fa-regular fa-heart" style="font-size: 30px;"></i></span></a>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>

                <div class="col-xs-9 pt-5">
                    <div class="tab_nav" style="width:100%;">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                    DETAILS
                                </button>
                            </li>
                            {{-- More information option  --}}
                            {{-- <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                    MORE INFORMATION
                                </button>
                            </li> --}}
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
                                    REVIEWS
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active mt-4" id="home" role="tabpanel" aria-labelledby="home-tab">
                                {!! $data->description !!}
                            </div>

                            <div class="tab-pane fade mt-4" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <h3 class="">Customer Reviews</h3>

                                @foreach ($reviews as $review)
                                    {{-- <span >Comment</span> --}}
                                    <h5 class="pt-3">Name: {{$review->user->name}}</h5>

                                    <div class="review my-2 ms-2">
                                        <span class="me-2">Quality</span>
                                        @if ($review->quality == 1)
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                        @endif
                                        @if ($review->quality == 2)
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                        @endif
                                        @if ($review->quality == 3)
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                        @endif
                                        @if ($review->quality == 4)
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                        @endif
                                        @if ($review->quality == 5)
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                        @endif
                                        <span class="ms-2">{{$review->comment}}.</span>
                                    </div>
                                    <div class="review my-2 ms-2">
                                        <span class="me-2">Price</span>
                                        @if ($review->price == 1)
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                        @endif
                                        @if ($review->price == 2)
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                        @endif
                                        @if ($review->price == 3)
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                        @endif
                                        @if ($review->price == 4)
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                        @endif
                                        @if ($review->price == 5)
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                            <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                        @endif
                                        <span class="ms-2">Posted on {{$review->created_at->format('m/d/Y')}}</span>
                                    </div>
                                    {{-- <div class="review my-2">
                                        <span class="me-2">Value</span>
                                        <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                        <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                        <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                        <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                        <span class="ms-2">Review by Magentech</span>
                                    </div> --}}
                                    {{-- <div class="review my-2">
                                        <span class="me-2">Price</span>
                                        <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                        <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                        <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                        <span class="text-danger"><i class="fa-solid fa-star"></i></span>
                                        <span class="ms-2">Posted on 5/20/19</span>
                                    </div> --}}
                                @endforeach
                                <hr>

                                <h5>You're reviewing:</h5>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <form action="{{route('review')}}" method="POST" id="review_form">
                                            @csrf
                                            <input type="hidden" value="{{$data->id}}" name="product_id">
                                            <div class="mb-3 row">
                                                <label for="staticEmail" class="col-sm-3 col-form-label">Your Rating <span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <div class="review my-2">
                                                        <span class="me-2">Quality</span>
                                                        <label class="quality-ratting" for="qr1">
                                                            <i class="fa-solid fa-star"></i>
                                                            <input type="hidden" name="quality_rating" value="1">
                                                        </label>
                                                        <label class="quality-ratting" for="qr2">
                                                            <i class="fa-solid fa-star"></i>
                                                            <input type="hidden" name="quality_rating" value="2">
                                                        </label>
                                                        <label class="quality-ratting" for="qr3">
                                                            <i class="fa-solid fa-star"></i>
                                                            <input type="hidden" name="quality_rating" value="3">
                                                        </label>
                                                        <label class="quality-ratting" for="qr4">
                                                            <i class="fa-solid fa-star"></i>
                                                            <input type="hidden" name="quality_rating" value="4">
                                                        </label>
                                                        <label class="quality-ratting" for="qr5">
                                                            <i class="fa-solid fa-star"></i>
                                                            <input type="hidden" name="quality_rating" value="5">
                                                        </label>
                                                    </div>
                                                    {{-- <div class="review my-2">
                                                        <span class="me-2">Value</span>
                                                        <span class="ratting"><i class="fa-solid fa-star"></i></span>
                                                        <span class="ratting"><i class="fa-solid fa-star"></i></span>
                                                        <span class="ratting"><i class="fa-solid fa-star"></i></span>
                                                        <span class="ratting"><i class="fa-solid fa-star"></i></span>
                                                    </div> --}}
                                                    <div class="review my-2">
                                                        <span class="me-2">Price</span>
                                                        <label class="price-ratting">
                                                            <i class="fa-solid fa-star"></i>
                                                            <input type="hidden" value="1">
                                                        </label>
                                                        <label class="price-ratting">
                                                            <i class="fa-solid fa-star"></i>
                                                            <input type="hidden" value="2">
                                                        </label>
                                                        <label class="price-ratting">
                                                            <i class="fa-solid fa-star"></i>
                                                            <input type="hidden" value="3">
                                                        </label>
                                                        <label class="price-ratting">
                                                            <i class="fa-solid fa-star"></i>
                                                            <input type="hidden" value="4">
                                                        </label>
                                                        <label class="price-ratting">
                                                            <i class="fa-solid fa-star"></i>
                                                            <input type="hidden" value="5">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="mb-3 row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">Nickname <span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" id="inputPassword">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">Summary <span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" id="inputPassword">
                                                </div>
                                            </div> --}}
                                            {{-- <div class="mb-3form-floating">
                                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                                <label for="floatingTextarea2">Comments</label>
                                              </div> --}}
                                            <div class="mb-3 row">
                                                <label for="comment" class="col-sm-3 col-form-label" style="resize: auto;">Comment <span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea name="comment" id="comment" cols="60" rows="6" placeholder="Leave a comment here"></textarea>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-sm-9 sub-review-div pt-5 text-center">
                                                    <button class="submit-review-btn px-3 py-2">Submit Review</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>



                {{--// Related product--}}
                @if (count($related_products))
                <div class="wrapper-container" style="margin-top: 100px;">
                    <div class="listingtab-style title-style-1" style="margin-bottom: 50px;">
                        <div id="listingtabs_0" class="block sm-listing-tabs slider">
                            <div class="block-title">
                                <strong>Related Products</strong>
                                {{-- <div class="posttext">
                                    Our food does not contain artificial preservatives, so it must be kept frozen to avoid expiration ahead of time.
                                </div> --}}
                            </div>

                            <!---- Featired product -->
                            <section id="featured-product">
                                <div class="">
                                    <!--- Owl carousel -->
                                    <div class="owl-carousel owl-theme row cols-2 cols-md-4 cols-lg-6">
                                        @forelse($related_products as $product)
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



            </div>
        </div>
    </div>
    </div>
@endsection
@push('custom-js')
    <script>
         @if (Session::has('review'))
            toastr.success("{{ Session::get('review')}}")
        @endif

        // Product details page custom js
            //ratting hover color management
            $('#submit-review-btn').on('click',function(e){
                e.preventDefault();
                if("{{Auth::user()}}"){
                    $("#review_form").submit();
                }else{
                    alert('Please, login');
                    return false
                }

            });


            $('.price-ratting').on('click',function(){
                $('.price-ratting').css({color:'gray'});
                $('.price-ratting').find('input').removeAttr('name');

                $(this).find('input').attr('name','price_rating');
                $(this).css({color:'red'});
                $(this).prevAll().css({color:'red'});
            });
            $('.quality-ratting').on('click',function(){
                $('.quality-ratting').css({color:'gray'});
                $('.quality-ratting').find('input').removeAttr('name');
                $(this).find('input').attr('name','quality_rating');
                $(this).css({color:'red'});
                $(this).prevAll().css({color:'red'});
            });
        let wish = "{{$data->wishlistCheck()}}";
                if(wish){
                    $('.dwishlist').show();
                    $('.nwishlist').hide();
                }else{
                    $('.dwishlist').hide();
                    $('.nwishlist').show();
                }
           $(document).ready(function() {
            DBaddToCart();
            $("ul.menu-items > li").on("click", function() {
                $("ul.menu-items > li").removeClass("active");
                $(this).addClass("active");
            });

            $(".attr,.attr2").on("click", function() {
                var clase = $(this).attr("class");
                $("." + clase).removeClass("active");
                $(this).addClass("active");
            });

              //increased price calculation
              $('.color-size').on('click',function(){
                    let price = Number($('.real-price').attr('data-value'));
                    let increase_price = Number($('input[name="p_color_id"]:checked').attr('data-value')?? 0) ;
                    let increase_priced = Number($('input[name="p_size_id"]:checked').attr('data-value')?? 0) ;
                    let qty = $('.cart-qty').val() ;
                    let single_price = price+increase_price+increase_priced;
                    let result = (price+increase_price + increase_priced)*qty;

                    $('.real-price').attr('id',single_price);
                    $('.real-price').val(result);
                })

                //Wishlist
                @if (serviceCheck('Wishlist'))
                    $('.nwishlist').on('click',function(){
                        let id = $(this).attr('data-id')
                        let ip_address = "{{Request::ip()}}";
                        let user_id = '';
                        @if(Auth::user())
                            user_id = "{{Auth::user()->id}}";
                        @endif

                        let data = {
                            product_id:id,
                            ip_address:ip_address,
                            user_id:user_id,
                        }
                        console.log(data);
                        ajax({action:'store',model:'Wishlist',data_obj:data},function(res){
                            console.log(res);
                            $('.dwishlist').show();
                            $('.dwishlist').attr('data-id',res.id);
                            $('.nwishlist').hide();
                        })
                    })
                    $('.dwishlist').on('click',function(){
                        let id = $(this).attr('data-id');
                        console.log(id);
                        ajax({action:'delete',model:'Wishlist',data_obj:{id:id}},function(res){
                            $('.nwishlist').show();
                            $('.dwishlist').hide();
                            console.log(res);
                        })
                    })
                @endif
        });
    </script>
@endpush
