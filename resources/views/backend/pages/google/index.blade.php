@extends('backend.layouts.app')

@section('title', 'Google Tag Management')

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
                            <h4>View google tag</h4>
                        </span>
                        <span class="float-right @if (!check('Google tag')->add) d-none @endif">
                            <a href="{{ route('google.create') }}" class="btn btn-info">Add google tag</a>
                        </span>
                    </div>
                    <div class="card-body">
                        @include('backend.partial.flush-message')

                        <div class="table-responsive">
                            <table id="table" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Google tag header</th>
                                    <th>Google tag footer</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($google as $googles)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $googles->gtag_header }}</td>
                                        <td>{{ $googles->gtag_footer }}</td>
                                        <td>{{ $googles->status }}</td>
                                        <td class="text-middle py-0 align-middle @if (!check('Google tag')->edit && !check('Google tag')->delete) d-none @endif">
                                            <div class="btn-group">
                                                <a href="{{ route('google.edit', $googles->id) }}" class="btn btn-dark btnEdit @if (!check('Google tag')->edit) d-none @endif"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('google.destroy', $googles->id) }}" class="btn btn-danger btnDelete @if (!check('Google tag')->delete) d-none @endif"><i class="fas fa-trash"></i></a>
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
                    title: 'Google Tag Management',
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
