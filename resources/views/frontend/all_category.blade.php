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

    <div class="">
        <div class="p-top-15" style="margin-top: 60px;">
            <div class="wrapper-container">
                <div class="d-grid gap-2 py-3">
                    <button class="btn rounded-0 py-2 text-white" style="background-color: #ff9801; text-align: left" type="button"><h4 class="m-0"><i class="fa-solid fa-list"></i> Most popular categories</h4></button>
                </div>
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-6 g-3">

                    @foreach($categories as $category)

                        <div class="col">
                            <a href="{{ route('category', [$category->id]) }}">
                                <div class="card bg-dark text-white border" style="border: #e7e7e7;">
                                    <img src="/{{ $category->img }}" class="card-img" alt="{{ $category->title }}">
                                    <div class="card-img-overlay ">
                                        <h5 class="card-title text-dark">{{ $category->title }}</h5>
                                        <button class="btn btn-primary text-white btn-sm" style="color: #0052b1;"><i class="fa-solid fa-basket-shopping"></i> Shop Now</button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
@push('custom-js')

@endpush
