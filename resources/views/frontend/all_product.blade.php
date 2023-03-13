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

            {{-- All Products show --}}
            <div class="" style="margin-top: 60px;">
                <div class="d-grid gap-2 py-3">
                    <button class="btn rounded-0 py-2" style="text-align: left" type="button"><h4 class="m-0"><i class="fa-solid fa-list"></i> {{$name}}</h4></button>
                </div>

                <div class="row row-cols-2 row-cols-md-6 g-3">
                    @foreach ($products as $product)
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
            </div>

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
