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
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table class="table table-striped m-auto table-sm">
                                <tbody>
                                    <tr>
                                        <td>Order Number:</td>
                                        <td>{{ $order->order_number }}</td>
                                    </tr>
                                    <tr>
                                        <td>Name:</td>
                                        <td>{{ $order->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone:</td>
                                        <td>{{ $order->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address:</td>
                                        <td>{{ $order->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping Price:</td>
                                        <td>{{ $order->shipping->price }}</td>
                                    </tr>
                                    <tr>
                                        <td>Payment Method:</td>
                                        <td>{{ $order->payment->payment }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>Product Details</h4>
                        </span>

                    </div>
                    <div class="card-body">
                        @include('backend.partial.flush-message')
                        <div class="table-responsive">
                            <table id="table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Product title</th>
                                        <th>Proudct Price</th>
                                        <th>Discount</th>
                                        <th>Quantity</th>
                                        <th>Total Amound</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total_dis = 0;
                                    @endphp
                                    @forelse($order->orderItem as $key => $item)

                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td> {{ $item->product->title }}</td>
                                            <td>{{ $item->product->price }}</td>
                                            <td>{{ $item->product->discount }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->price - ($total_dis += $item->product->discount *2)}}</td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>Shipping =</td>
                                        <td>{{ $order->shipping->price }}৳</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="fw-bold h5">Total =</td>
                                        <td class="fw-bold h5">{{ $order->total- $total_dis }}৳</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
