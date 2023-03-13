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
    <div class="container-fluid">
        <div class="p-top-15 container-fluid">
            {{-- Main banner  --}}
            <div class="row slider_top" style="">
                <div class="col-lg-12">
                    <div id="carouselExampleIndicators" class="carousel slide mt-2" data-bs-ride="true">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            @foreach ($sliders as $slider)
                                <div class="carousel-item @if ($loop->first) active @endif">
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
                    <div class="row text-center py-3 text-white slider_bottom"
                        style="padding-top:10px; margin-left: 0; margin-right: 0; background-color: #0d21a1">
                        <div class="col-md-4 col-lg-4">
                            <h6>MONEY BACK</h6>
                            <p class="m-0">30 Days Money Back Guarantee</p>
                        </div>
                        <div class="col-md-4 col-lg-4 py-3 py-lg-0 py-md-0">
                            <h6>FREE SHIPPING</h6>
                            <p class="m-0">Shipping on orders over ৳1000</p>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <h6>SPECIAL SALE</h6>
                            <p class="m-0">Extra ৳20 off on all items</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="d-grid gap-2 py-3">
                    <button class="btn rounded-0 py-2 text-white bg-primary" style="text-align: left" type="button"><h5 class="m-0"><i class="fa-solid fa-list"></i> TODAY HOT OFFER</h5></button>
                </div>
                <div class="d-flex">
                    {{-- <div class="row"> --}}
                    @foreach ($categories as $category)
                        <div class="@if (!$loop->first) ms-2 @endif">
                            {{-- <div class="col-md-6 col-lg-6 col-sm-4"> --}}
                            <a href="{{ url('all_category') }}">
                                <div class="card bg-dark text-white border" style="border: #e7e7e7;">
                                    <img src="{{ asset($category->img) }}" class="card-img" alt="">
                                    <div class="card-img-overlay ">
                                        {{--<h5 class="card-title text-dark">Test</h5>--}}
                                        <button class="btn btn-sm btn-primary text-white" style="color: #0052b1;"><i class="fa-solid fa-basket-shopping"></i> Shop Now</button>

                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            @if (count($products))
                @foreach ($products as $group_product)
                    <div class="">
                        @if ($group_product['name'])
                          @if (count($group_product)>1)
                          <div class="d-flex justify-content-between">
                            <div class=" py-3">
                                <button class="btn rounded-0 py-2" style="text-align: left" type="button">
                                    <h5 class="m-0"><i class="fa-solid fa-list"></i> {{ $group_product['name'] }}
                                    </h5>
                                </button>
                            </div>
                            <div class="py-3">
                                <a href="{{ url('all_product') }}" class="btn rounded-0 py-2" style="text-align: left"
                                    type="button">
                                    <h5 class="m-0"><i class="fa fa-eye"></i> VIEW ALL</h5>
                                </a>
                            </div>
                        </div>
                        <div class="row row-cols-2 row-cols-md-6 g-3">
                            @foreach ($group_product as $product)
                                @if (gettype($product) == 'string')
                                    @continue
                                @endif
                                <div class="col">
                                    <div class="card h-100 product-div text-center">
                                        <a href="{{ route('product_details', [$product->id]) }}">
                                            <img class="bd-placeholder-img card-img-top img{{ $product->id }}"
                                                src='{{ asset("$product->photo") }}' alt="{{ $product->title }}"
                                                title="{{ $product->title }}" width="100%" height="225">
                                        </a>
                                        <div class="card-body">
                                            <a href="{{ route('product_details', [$product->id]) }}">
                                                <h5 class="card-title product-title">{{ $product->title }}</h5>
                                            </a>
                                            <p class="card-text">
                                            <div class="btn-group ">
                                                <button type="button"
                                                    class="btn btn-sm text-dark border border-2 border-info">৳
                                                    <span class='price'
                                                        data-value='{{ $product->price - ($product->discount ?? 0) }}'>{{ en2bn($product->price - ($product->discount ?? 0)) }}</span>
                                                </button>
                                                <button type="button"
                                                    class="btn btn-sm border text-danger border-2 border-success">
                                                    <span class='with-discount'
                                                        data-value='{{ $product->price }}'>৳{{ en2bn($product->price) }}</span>
                                                </button>
                                            </div>
                                            </p>
                                        </div>

                                        <div class="card-footer">
                                            <a href="javascript:void(0)" class="btn btn-primary nadd-to-cart"
                                                data-value="{{ $product->id }}">
                                                <i class="fa fa-cart-plus"></i><span> Add to Cart</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                          @endif
                    </div>
                @else
                    <div class="d-flex justify-content-between">
                        <div class=" py-3">
                            <button class="btn rounded-0 py-2" style="text-align: left" type="button">
                                <h5 class="m-0"><i class="fa-solid fa-list"></i>Products</h5>
                            </button>
                        </div>
                        <div class="py-3">
                            <a href="{{ url('all_product') }}" class="btn rounded-0 py-2" style="text-align: left"
                                type="button">
                                <h5 class="m-0"><i class="fa fa-eye"></i> VIEW ALL</h5>
                            </a>
                        </div>
                    </div>
                    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-3">
                        @foreach ($products as $product)
                            <div class="col d-flex align-items-stretch">
                                <div class="card h-100 product-div">
                                    <a href="{{ route('product_details', [$product->id]) }}">
                                        <img class="bd-placeholder-img card-img-top" src='{{ asset("$product->photo") }}'
                                            alt="{{ $product->title }}" title="{{ $product->title }}" width="100%"
                                            height="225">
                                    </a>
                                    <div class="card-body">
                                        <a href="{{ route('product_details', [$product->id]) }}">
                                            <h5 class="card-title product-title">{{ $product->title }}</h5>
                                        </a>
                                        <p class="card-text">
                                        <div class="btn-group ">
                                            <button type="button"
                                                class="btn btn-sm text-dark border border-2 border-info">৳
                                                <span class='price'
                                                    data-value='{{ $product->price - ($product->discount ?? 0) }}'>{{ en2bn($product->price - ($product->discount ?? 0)) }}</span>
                                            </button>
                                            <button type="button"
                                                class="btn btn-sm border text-danger border-2 border-success">৳
                                                <span class='with-discount'
                                                    data-value='{{ $product->price }}'>{{ en2bn($product->price) }}</span>
                                            </button>
                                        </div>
                                        </p>
                                    </div>

                                    <div class="card-footer">
                                        <a href="javascript:void(0)" class="btn nadd-to-cart"
                                            data-value="{{ $product->id }}">
                                            <i class="fa fa-cart-plus"></i><span> Add to Cart</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @break

                </div>
            @endif
    </div>
    @endforeach
    @endif


</div>
@endsection
@push('custom-js')
<script>
    $(document).ready(function() {
        DBaddToCart();
    });

</script>
@endpush
