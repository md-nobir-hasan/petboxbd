@extends('frontend.layouts.app')
@push('custom-css')
    <style>
        .product-image {
            max-height: 100px;
        }

        #cart_mobile a {
            color: black;
        }
    </style>
@endpush
@section('page_conent')

    <div class="container-fluid">
        <div class="p-top-15 container-fluid">
            {{-- New Arrivals Products  --}}
            <div class="" style="margin-top: 60px;">
                <div class="d-grid gap-2 py-3">
                    <button class="btn rounded-0 py-2" style="text-align: left" type="button"><h4 class="m-0"><i class="fa-solid fa-list"></i> Category wise show products</h4></button>
                </div>

                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-3">

                    @forelse($products as $product)
                        <div class="col d-flex align-items-stretch">
                            <div class="card shadow-sm pb-3 align-items-center d-flex flex-column">
                                <a href="{{ route('product_details', [$product->id]) }}">
                                    <img class="bd-placeholder-img card-img-top img{{ $product->id }}" src='{{ asset("$product->photo") }}' alt="{{ $product->title }}" title="{{ $product->title }}" width="100%" height="225">
                                    <div class="card-body text-center">
                                        <h5 class="card-title text-dark mb-0 title{{ $product->id }}">{{ $product->title }}</h5>
                                    </div>
                                </a>
                                <div class="text-center">
                                    {{-- <div class="d-flex justify-content-center align-items-center mb-3"> --}}
                                        <div class="price py-2">
                                            @if($product->discount == 0.00)
                                                <span class="regular text-danger">৳</span><span class="text-danger regular-price price{{ $product->id }}">{{$product->price }}</span>
                                            @else
                                                <span class="special regular m-0 text-danger">৳</span><span class="text-danger regular-price price{{ $product->id }}">{{$product->price- ($product->discount ?? 0) }}</span>
                                                <span class="" style="text-decoration: line-through;">৳</span><span class="dis-price dis-price{{ $product->id }}" style="text-decoration: line-through">{{$product->price }}</span>
                                            @endif
                                        </div>
                                    {{-- </div> --}}
                                    <a href="" class="btn btn-primary add-to-cart" id="{{ $product->id }}">
                                        <i class="fa fa-cart-plus"></i><span> Add to Cart</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        @if (isset($category))
                            <p class="w-100 text-center">There are no products in category</p>
                        @else
                            <p class="w-100 text-center">There are no products</p>
                        @endif
                    @endforelse

                </div>
            </div>

            {{-- New Arrivals Products  --}}
            {{--<div class="wrapper-container">
                <div class="d-grid gap-2 py-3">
                    <button class="btn rounded-0 py-2" style="text-align: left" type="button"><h4 class="m-0"><i class="fa-solid fa-list"></i> Best Selling Products</h4></button>
                </div>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">

                    @forelse($products as $product)
                        <div class="col">
                            <div class="card shadow-sm pb-3">
                                <a href="{{ route('product_details', [$product->id]) }}">
                                    <img class="bd-placeholder-img card-img-top img{{ $product->id }}" src='{{ asset("$product->photo") }}' alt="{{ $product->title }}" title="{{ $product->title }}" width="100%" height="225">
                                    <div class="card-body text-center">
                                        <h5 class="card-title text-dark mb-0 title{{ $product->id }}">{{ $product->title }}</h5>
                                    </div>
                                </a>
                                <div class="text-center">
                                    <div class="d-flex justify-content-center align-items-center mb-3">
                                        <div class="btn-group ">
                                            <button type="button" class="btn btn-sm btn-price text-dark dis-price{{ $product->id }}">৳ {{ $product->price - ($product->discount ?? 0) }}</button>
                                            <button type="button" style="text-decoration: line-through;" class="btn btn-sm btn-disprice price{{ $product->id }}">৳ {{ $product->price }}</button>
                                        </div>
                                    </div>
                                    <a href="" class="btn add-to-cart" id="{{ $product->id }}">
                                        <i class="fa fa-cart-plus"></i><span> Add to Cart</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        @if (isset($category))
                            <p class="w-100 text-center">There are no products in category</p>
                        @else
                            <p class="w-100 text-center">There are no products</p>
                        @endif
                    @endforelse

                </div>
            </div>--}}

            {{-- New Arrivals Products  --}}{{--
            <div class="wrapper-container">
                <div class="d-grid gap-2 py-3">
                    <button class="btn rounded-0 py-2" style="text-align: left" type="button"><h4 class="m-0"><i class="fa-solid fa-list"></i> Featured Products</h4></button>
                </div>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">

                    @forelse($products as $product)
                        <div class="col">
                            <div class="card shadow-sm pb-3">
                                <a href="{{ route('product_details', [$product->id]) }}">
                                    <img class="bd-placeholder-img card-img-top img{{ $product->id }}" src='{{ asset("$product->photo") }}' alt="{{ $product->title }}" title="{{ $product->title }}" width="100%" height="225">
                                    <div class="card-body text-center">
                                        <h5 class="card-title text-dark mb-0 title{{ $product->id }}">{{ $product->title }}</h5>
                                    </div>
                                </a>
                                <div class="text-center">
                                    <div class="d-flex justify-content-center align-items-center mb-3">
                                        <div class="btn-group ">
                                            <button type="button" class="btn btn-sm btn-price text-dark dis-price{{ $product->id }}">৳ {{ $product->price - ($product->discount ?? 0) }}</button>
                                            <button type="button" style="text-decoration: line-through;" class="btn btn-sm btn-disprice price{{ $product->id }}">৳ {{ $product->price }}</button>
                                        </div>
                                    </div>
                                    <a href="" class="btn add-to-cart" id="{{ $product->id }}">
                                        <i class="fa fa-cart-plus"></i><span> Add to Cart</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        @if (isset($category))
                            <p class="w-100 text-center">There are no products in category</p>
                        @else
                            <p class="w-100 text-center">There are no products</p>
                        @endif
                    @endforelse

                </div>
            </div>
--}}
        </div>
    </div>
@endsection
@push('custom-js')

@endpush
