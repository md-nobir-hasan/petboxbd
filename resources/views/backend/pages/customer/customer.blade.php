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

                @if(session()->has('message'))
                    <div class="alert alert-info">{{ session('message') }}</div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>View Customer</h4>
                        </span>
                    </div>
                    <div class="card-body">
                        @include('backend.partial.flush-message')
                        <div class="table-responsive">
                            <table id="table" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Name</th>
                                    <th>phone</th>
                                    <th>Email</th>
                                    <th>District</th>
                                    <th>Message</th>
                                    <th class="@if (!check('Customer Contact')->edit && !check('Customer Contact')->delete) d-none @endif"
                                        id="action">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($customers as $customer)
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->phone }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->distirct }}</td>
                                            <td>{{ $customer->message }}</td>
                                            <td class="@if (!check('Customer Contact')->edit && !check('Customer Contact')->delete) d-none @endif">
                                                <div class="btn-group">
                                                    <a href="{{ route('customer.view', $customer->id) }}" class="btn btn-info btn-sm view-btn mr-2 @if (!check('Customer Contact')->edit) d-none @endif" title="View Order Details"><i class="fas fa-eye"></i></a>
                                                    <a href="{{ route('customer.delete', $customer->id) }}" class="btn btn-danger btn-sm view-btn mr-2 @if (!check('Customer Contact')->delete) d-none @endif" title="View Order Details"><i class="fas fa-trash"></i></a>
                                                    <a href="" class="btn btn-primary btn-sm">Send_Email</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
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
@endpush

@push('page_scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'pdfHtml5',
                    title: 'District Management',
                    download: 'open',
                    orientation: 'potrait',
                    pagesize: 'LETTER',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                    }
                },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
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
            //     });
            // });
        }
    </script>
@endpush
{{-- var form_data = new FormData();
form_data.append('name', $('#name').val());
form_data.append('address', $('#address')
.val());
form_data.append('discount', discount_v);
form_data.append('id', data[0].cake_id);
$.ajax({
method: "POST",
url: '{{ url('order.store') }}',
data: form_data,
// dataType:'json',
contentType: false,
cache: false,
processData: false,
success: function(value) {
// alert(value);
// $.ajax({
// cache: false,
// url: "{{ url('order.store') }}",
// method: "POST",
// success: function(
// data) {
// $("#show_data")
// .html(
// data
// );
// }
// });

}
}); --}}
