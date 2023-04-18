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


            {{--// New product --}}
            @if (count($wishlists))
                <div class="wrapper-container" style="margin-top: 100px;">
                    <div class="listingtab-style title-style-1" style="margin-bottom: 50px;">
                        <div id="listingtabs_0" class="block sm-listing-tabs slider">
                            <div class="block-title">
                                <div class="d-grid gap-2 py-3">
                                    <button class="btn rounded-0 py-2" style="text-align: left" type="button"><h4 class="m-0"><i class="fa-solid fa-list"></i> {{$name}}</h4></button>
                                </div>
                            </div>

                            <!---- Featired product -->
                            <section id="featured-product">
                                <div class="">
                                    <!--- Owl carousel -->
                                    <div class="owl-carousel owl-theme row cols-2 cols-md-4 cols-lg-6">
                                        @forelse($wishlists as $product)
                                            <div class="item col pb-4 pt-1 border m-2">
                                                <div class="product-div font-rale">
                                                    <a href="{{ route('product_details', [$product->product->id]) }}">
                                                        <img class="img-fluid img{{ $product->product->id }}" src='{{ asset($product->product->photo) }}' alt="{{ $product->product->title }}" title="{{ $product->product->title }}">
                                                        <h6 class="text-center title{{ $product->product->id }}">{{ $product->product->title }}</h6>
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
                                                            @if($product->product->discount == 0.00)
                                                                <span class="regular text-danger">৳</span><span class="text-danger regular-price price{{ $product->product->id }}">{{$product->product->price }}</span>
                                                            @else
                                                                <span class="special regular m-0 text-danger">৳</span><span class="text-danger regular-price price{{ $product->product->id }}">{{$product->product->price- ($product->product->discount ?? 0) }}</span>
                                                                <span class="" style="text-decoration: line-through;">৳</span><span class="dis-price dis-price{{ $product->product->id }}" style="text-decoration: line-through">{{$product->product->price }}</span>
                                                            @endif
                                                        </div>
                                                        <a href="javascript:void(0)" class="btn btn-sm nadd-to-cart" data-value="{{ $product->product->id }}">
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
@endsection
@push('custom-js')
<script>
    $(document).ready(function() {
        DBaddToCart();
    });

</script>
@endpush

