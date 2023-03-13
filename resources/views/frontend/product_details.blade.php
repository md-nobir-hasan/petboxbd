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
        }

        .title-attr {
            margin-top: 0;
            margin-bottom: 0;
            color: black;
        }

        .btn-minus {
            cursor: pointer;
            font-size: 1.1em;
            display: flex;
            align-items: center;
            padding: 8px;
            padding-left: 10px;
            padding-right: 10px;
            border: 1px solid #009688;
            border-radius: 2px;
            border-right: 0;
            background-color: #009688;
            color: white;
            border-bottom-left-radius: 5px;
            border-top-left-radius: 5px;
        }

        .btn-plus {
            cursor: pointer;
            font-size: 1.1em;
            display: flex;
            align-items: center;
            padding: 8px;
            padding-left: 10px;
            padding-right: 10px;
            border: 1px solid #009688;
            border-radius: 2px;
            border-left: 0;
            background-color: #009688;
            color: white;
            border-bottom-right-radius: 5px;
            border-top-right-radius: 5px;
        }

        div.section>div {

            display: inline-flex;
        }

        div.section>div>input {
            margin: 0;
            padding-left: 5px;
            font-size: 17px;
            padding-right: 5px;
            text-align: center;
            width: 100px;
            padding-top: 0.2em;
            padding-bottom: 0.2em;
            border: 1px solid #009688;
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

        .btn:hover {
            background: #009688;
            color: white;
        }

        .custom-btn {
            background: #009688;
            padding: 9px 27px;
            color: #333;
            font-weight: 600;
            font-size: 15px;
            border-radius: 5px;
            margin-top: 10px;
            display: inline-block;
            cursor: pointer;
            margin-bottom: 10px;
        }
        input.real-price{
            width: 50px;
        }
    </style>
@endpush
@section('page_conent')
    <div class="main-content-wrapper home-page">
        <div class="wrapper-container p-top-15">
            <div style="margin-top: 80px; padding: 15px;">
                <div class="row bg-white" style="padding: 20px;">
                    <div class="col-lg-4 col-md-5 item-photo">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-interval="false">
                            <div class="carousel-inner product-div">
                                @foreach ($data->productGallery as $image)
                                    <div class="carousel-item cs{{ $image->color_id }}{{ $image->size_id }} @if ($loop->first) active @endif">
                                        <img src="{{ asset($image->imageGallery->img) }}" class="d-block w-100" style="max-width:100%;" alt="">
                                    </div>
                                @endforeach
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 mt-4 mt-lg-0 mt-md-0 product_dright" style="border:0px solid #808080; ">
                        <h4 class="title{{ $data->id }}">{{ $data->title }}</h4>
                        <div class="short-description">
                            <h4>Summary</h4>
                            <p>
                                {!! $data->summary !!}
                            </p>
                        </div>
                        <hr>
                        <h4 class="title-attr" style="margin-top:15px;">In Stock: {{ $data->stock }}</h4>
                        <form action="{{route('single.store')}}" method="POST">
                            @csrf
                            <div class="price py-1">
                                <span class="fw-bold">Price:</span>&nbsp;&nbsp;
                                <span class="special">৳</span>
                                <input class="special real-price border-0 disabled" name="subtotal" id="{{ $data->price - $data->discount }}" data-value="{{ $data->price - $data->discount }}" value="{{ $data->price - $data->discount }}">&nbsp;&nbsp;
                                <span style="text-decoration: line-through; color: red;"
                                    class="regular with-discount">৳{{ $data->price }}</span>
                            </div>
                            @if (!serviceCheck('No Color & Size'))
                                    <div class="d-flex product-color">
                                        <span class="fw-bold">Colors:</span>
                                        @if(count($data->color))
                                            @foreach ($data->color as $pc)
                                                <div class="form-check ms-3">
                                                    <input class="form-check-input color color-size" type="radio" name="p_color_id"
                                                        data-id='{{ $pc->id }}' value="{{ $pc->id }}"
                                                        id="defaultCheck{{ $loop->index }}" data-value="{{ $pc->price_increase }}" required>
                                                    <label class="form-check-label" for="defaultCheck{{ $loop->index }}">
                                                        {{ $pc->color->c_name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        @else

                                            @foreach ($data->productGallery as $pg)
                                            @if ($pg->color)
                                                <div class="form-check ms-3">
                                                    <input class="form-check-input color color-size" type="radio" name="p_color_id"
                                                        data-id='{{ $pg->id }}' value="{{ $pg->id }}" data-value="{{ $pg->price_increase }}"
                                                        id="defaultCheck{{ $loop->index }}" required>
                                                    <label class="form-check-label" for="defaultCheck{{ $loop->index }}">
                                                        {{ $pg->color->c_name }}
                                                    </label>
                                                </div>
                                            @else
                                                @if($loop->first)
                                                    <span class="ms-3"> One color</span>
                                                @endif
                                            @endif

                                            @endforeach
                                        @endif
                                    </div>

                                    <div class="d-flex product-size">
                                        <span class="fw-bold">Sizes</span><span class="ms-2 fw-bold"> :</span>
                                        @if (count($data->productSize))
                                            @foreach ($data->productSize as $ps)
                                                <div class="form-check ms-3">
                                                    <input class="form-check-input size color-size" type="radio" name="p_size_id"
                                                        data-id='{{ $ps->id }}' value="{{ $ps->id }}" data-value="{{ $ps->price_increase }}"
                                                        id="defaultCheck{{ $loop->index }}" required>
                                                    <label class="form-check-label" for="defaultCheck{{ $loop->index }}">
                                                        {{ $ps->size->size }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        @else
                                            @foreach ($data->productGallery as $pc)
                                            @if ($pc->size)
                                                <div class="form-check ms-3">
                                                    <input class="form-check-input size color-size" type="radio" name="p_size_id"
                                                        data-id='{{ $pc->id }}' value="{{ $pc->id }}"
                                                        id="defaultCheck{{ $loop->index }}" data-value="{{ $pc->price_increase }}" required>
                                                    <label class="form-check-label" for="defaultCheck{{ $loop->index }}">
                                                        {{ $pc->size->size }}
                                                    </label>
                                                </div>
                                            @else
                                                @if($loop->first)
                                                    <span class="ms-3"> One Size</span>
                                                @endif
                                            @endif

                                            @endforeach
                                        @endif
                                    </div>

                            @endif
                            <div class="section d-flex flex-wrap justify-content-sm-start mt-4">
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <div class="btn-minus btn btn-sm minus"><i class="fa-solid fa-minus"></i></div>
                                    <input name="qty" class="cart-qty"  value="1" autocomplete="off" />
                                    <div class="btn-plus btn btn-sm plus"><i class="fa-solid fa-plus"></i></div>
                                </div>

                            </div>
                            <div class="d-flex justify-content-sm-start mt-2">
                                <div>
                                    <button class="btn custom-btn text-white rounded nadd-to-cart" data-value="{{ $data->id }}">
                                        <i class="fa fa-cart-plus"></i> ADD TO CART
                                    </button>
                                </div>
                                <div>
                                    <button type="button" style="margin-left: 15px;" class="btn custom-btn text-white rounded add-to-cart"
                                        id="{{ $data->id }}" data-bs-toggle="collapse"
                                        data-bs-target="#collapseExample" aria-expanded="false"
                                        aria-controls="collapseExample"><i class="fa-sharp fa-solid fa-bag-shopping"></i> ORDER NOW
                                    </button>
                                </div>
                            </div>
                            <div class="collapse" id="collapseExample">
                                <div class="card mt-4">
                                    <div class="card-header">
                                        <h3 class="text-center"> Fill up the form </h3>
                                        <input type="hidden" name="product_id" value="{{$data->id}}">
                                        @if(Auth::user())
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        @endif
                                    </div>
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label for="name" class="form-label">Full Name<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control"
                                                    value="{{ Auth::id() ? Auth::user()->name : '' }}" name="name"
                                                    id="name" placeholder="Enter your full name" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="phone" class="form-label">Phone No.<span
                                                        class="text-danger">*</span></label>
                                                <input type="tel" class="form-control"
                                                    value="{{ Auth::id() ? Auth::user()->phone : '' }}" name="phone"
                                                    id="phone" placeholder="Enter your phone number" required>
                                            </div>
                                            @if (count($shippings))
                                                <div class="col-md-4 mb-3">
                                                    <label for="shipping_id" class="form-label">Delivery Charge<span
                                                            class="text-danger">*</span></label>
                                                    <select name="shipping_id" class="form-select" id="shipping_id"
                                                        required>
                                                        <option value="">Select shipping area</option>
                                                        @foreach ($shippings as $shipping)
                                                            <option value="{{ $shipping->id ?? old('shipping') }}">
                                                                {{ $shipping->type . '(' . en2bn($shipping->price) . '৳)' }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif
                                            <div class="col-md-6 mb-3">
                                                <label for="address" class="form-label">Address<span
                                                        class="text-danger">*</span></label>
                                                <textarea name="address" class="form-control" id="address" cols="30" rows="3"
                                                    placeholder="Enter your full address" required>{{ Auth::id() ? Auth::user()->address : '' }}</textarea>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="note" class="form-label">Note</label>
                                                <textarea name="note" class="form-control" id="note" cols="30" rows="3"
                                                    placeholder="Enter note your opinion"></textarea>
                                            </div>
                                            @if (count($payments))
                                                <div class="col-md-4 mb-3">
                                                    <label for="payment_id" class="form-label">Payment system<span
                                                            class="text-danger">*</span></label>
                                                    <select name="payment_id" id="payment_id" class="form-select">
                                                        @foreach ($payments as $payment)
                                                            <option value="{{ $payment->id }}">{{ $payment->payment }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row ">
                                            <div class="col-md-11 m-auto">

                                                <button class="btn btn-warning tw-bold w-100 text-whit">Confirm Order</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row bg-white mt-4" style="padding: 20px;">
                    <div class="col-12 pd_description mt-4">
                        <div class="padding">
                            <h2 style="">Dectiption</h2>
                            <div style="width:100%;border-top:1px solid silver">
                                <p style="">
                                    {!! $data->description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
@push('custom-js')
    <script>
        // Product details page custom js
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
        });
    </script>
@endpush

