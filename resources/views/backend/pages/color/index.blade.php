@extends('backend.layouts.app')

@section('title', 'Brand Management')

@push('third_party_stylesheets')
    <link href="{{ asset('assets/backend/js/DataTable/datatables.min.css') }}" rel="stylesheet">
@endpush

@push('page_css')
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h1>View product color</h1>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('color.create') }}" class="btn btn-info">Add new product color</a>
                        </span>
                    </div>
                    <div class="card-body">

                        @include('backend.partial.flush-message')

                        <div class="table-responsive">
                            <table id="table" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Product color name</th>
                                    <th>Product color</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product_color as $color)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $color->c_name }}</td>
                                        <td><input type="color" class="form-control d-inline readonly w-50 m-auto" value="{{ $color->c_code }}" readonly></td>
                                        <td>{{ $color->status }}</td>
                                        <td class="text-middle py-0 align-middle">
                                            <div class="btn-group">
                                                <a href="{{ route('color.edit', $color->id) }}" class="btn btn-dark btnEdit"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('color.destroy', $color->id) }}" class="btn btn-danger btnDelete"><i class="fas fa-trash"></i></a>
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
                        columns: [0, 1, 2]
                    }
                },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    }, 'pageLength'
                ]
            });
        });
    </script>
@endpush
