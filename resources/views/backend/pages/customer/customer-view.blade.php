@extends('backend.layouts.app')

@section('title', 'Order Management')

@push('third_party_stylesheets')
    <link href="{{ asset('assets/backend/js/DataTable/datatables.min.css') }}" rel="stylesheet">
@endpush

@push('page_css')
    <style>
        .btn-box {
            display: flex;
            justify-content: center;
        }

        .dialogify-bottom-select {
            margin-bottom: 33px;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Cusomer Details</h3>
                    </div>
                    <div class="">
                        <div class="rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                            <p class="m-0">{{ $customer->name }}</p>
                            <p class="mt-3">{{ $customer->phone }}</p>
                            <p>{{ $customer->email }}</p>
                            <p>{{ $customer->district }}</p>
                            <p>{{ $customer->message }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
