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
                        <span class="float-left">
                            <h4>View Order</h4>
                        </span>
                        <span class="float-right">
                            @if (serviceCheck('Excel'))
                                <button  class="btn btn-info" id="excel">Export as Excel</button>
                            @endif
                            <a href="{{ route('order.trash') }}" class="btn btn-danger">View Trash</a>
                            <a href="{{ route('order.index') }}" class="btn btn-info">Back</a>
                        </span>
                    </div>
                    <div class="card-body">
                        @include('backend.partial.flush-message')
                        <div class="table-responsive">
                            <table id="table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Order No.</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Total</th>
                                        <th>Total Product</th>
                                        <th>Address</th>
                                        {{--<th>Shipping</th>
                                        <th>Total Amount</th>--}}
                                        <th>Ordered Date</th>
                                        @if (serviceCheck('Order Status'))
                                            <th>Order Status</th>
                                        @endif
                                        <th class="@if (!check('Order')->edit && !check('Order')->delete) d-none @endif"
                                            id="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $key => $order)
                                        <tr>
                                            <td class="align-middle">{{ $loop->index }}</td>
                                            <td class="align-middle">{{ $order->order_number }}</td>
                                            <td class="align-middle">{{ $order->name }}</td>
                                            <td class="align-middle">{{ $order->phone }}</td>
                                            <td class="align-middle">{{ $order->total }}</td>
                                            <td class="align-middle">{{count($order->orderItem) }}</td>
                                            <td class="align-middle">{{ $order->address }}</td>

                                            {{-- <td class="align-middle">{{ $order->toalQty() }}</td> --}}

                                            {{--<td class="align-middle">
                                                {{ $order->shipping->type . '(' . $order->shipping->price . ')৳' }}</td>
                                            <td class="align-middle">{{ $order->total() }}</td>--}}
                                            {{-- <td>{{ $order->quantity->payment_method ?? 'Cash on Delivery' }} --}}
                                            </td>
                                            {{-- <td>{{ $order->payment_number }}</td> --}}
                                            {{-- <td>{{ $order->pamyment_method}}</td> --}}
                                            <td class="align-middle">{{ date('d-m-Y', strtotime($order->created_at)) }}
                                            </td>
                                            @if (serviceCheck('Order Status'))
                                                <td class="align-middle">
                                                    <a class="btn">
                                                        @if ($order->order_status == 'new')
                                                            <span class="badge badge-primary order_status"
                                                                onclick="orderStatus({{ $order->id }},{{ $loop->index }})"
                                                                id="order_status{{ $loop->index }}">{{ $order->order_status }}</span>
                                                        @elseif($order->order_status == 'process')
                                                            <span class="badge badge-warning order_status"
                                                                onclick="orderStatus({{ $order->id }},{{ $loop->index }})"
                                                                id="order_status{{ $loop->index }}">{{ $order->order_status }}</span>
                                                        @elseif($order->order_status == 'delivered')
                                                            <span class="badge badge-success order_status"
                                                                onclick="orderStatus({{ $order->id }},{{ $loop->index }})"
                                                                id="order_status{{ $loop->index }}">{{ $order->order_status }}</span>
                                                        @else
                                                            <span class="badge badge-danger order_status"
                                                                onclick="orderStatus({{ $order->id }},{{ $loop->index }})"
                                                                id="order_status{{ $loop->index }}">{{ $order->order_status }}</span>
                                                        @endif
                                                    </a>
                                                </td>
                                            @endif
                                            <td class="align-middle @if (!check('Order')->edit && !check('Order')->delete) d-none @endif">
                                                <div class="btn-group">
                                                    {{-- <a href="{{ route('order.edit', $order->id) }}"
                                                        class="btn btn-dark btnEdit" title="Edit"><i
                                                            class="fas fa-edit"></i></a> --}}

                                                    <a href="{{ route('order.view', $order->id) }}"
                                                        class="btn btn-info view-btn @if (!check('Order')->edit) d-none @endif" title="View Order Details"><i
                                                            class="fas fa-eye"></i></a>
                                                    <a href="{{ route('order.delete', $order->id) }}"
                                                        class="btn btn-danger btnDelete @if (!check('Order')->delete) d-none @endif" title="Move to trash"><i
                                                            class="fas fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@push('third_party_scripts')
    <script src="{{ asset('assets/backend/js/DataTable/datatables.min.js') }}"></script>
    <script src="https://www.jqueryscript.net/demo/Dialog-Modal-Dialogify/dist/dialogify.min.js"></script>
    <script src="{{asset('assets/backend/js/excel/excel.js')}}"></script>
@endpush

@push('page_scripts')
    <script>
        $(document).ready(function() {
            // Save as excel file
            var table2excel = new Table2Excel();
            $('#excel').on('click',function(){
                table2excel.export(document.querySelectorAll("table"));
            });

            $('#table').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'pdfHtml5',
                        title: 'Order Management',
                        download: 'open',
                        orientation: 'potrait',
                        pagesize: 'LETTER',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7,8]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7,8]
                        }
                    }, 'pageLength'
                ]
            });
        });

        // Dialogify
        function orderStatus(order_id, key) {
            var options = {
                ajaxPrefix: ''
            };
            new Dialogify('{{ url('order-status/ajax') }}', options)
                .title("Ordere Status")
                .buttons([{
                        text: "Cancle",
                        type: Dialogify.BUTTON_DANGER,
                        click: function(e) {
                            this.close();
                        }
                    },
                    {
                        text: 'Status update',
                        type: Dialogify.BUTTON_PRIMARY,
                        click: function(e) {
                            var name = $('#order_status_name').val();

                            $.ajax({
                                cache: false,
                                url: "{{ route('order-status.order-status-assign') }}",
                                method: "GET",
                                data: {
                                    name: name,
                                    order_id: order_id
                                },
                                success: function(data) {
                                    if (data != 0) {
                                        alert('Order Status successfully updated')
                                        // console.log($('#order_status').html());
                                        $('#order_status' + key).html(data);

                                    } else {
                                        alert("Order Status can't update")

                                    }
                                }
                            });

                        }
                        // }
                    }
                ]).showModal();

        }
    </script>
@endpush

