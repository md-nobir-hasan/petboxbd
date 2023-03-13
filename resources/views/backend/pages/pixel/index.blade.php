@extends('backend.layouts.app')

@section('title', 'Pixel Tag Management')

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
                            <h4>View pixel tag</h4>
                        </span>
                        <span class="float-right @if (!check('Pixel tag')->add) d-none @endif">
                            <a href="{{ route('pixel.create') }}" class="btn btn-info">Add pixel tag</a>
                        </span>
                    </div>
                    <div class="card-body">
                        @include('backend.partial.flush-message')

                        <div class="table-responsive">
                            <table id="table" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Pixel tag header</th>
                                    <th>Pixel tag footer</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($pixel as $pixels)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pixels->ptag_header }}</td>
                                            <td>{{ $pixels->ptag_footer }}</td>
                                            <td>{{ $pixels->status }}</td>
                                            <td class="text-middle py-0 align-middle @if (!check('Pixel tag')->edit && !check('Pixel tag')->delete) d-none @endif">
                                                <div class="btn-group">
                                                    <a href="{{ route('pixel.edit', $pixels->id) }}" class="btn btn-dark btnEdit @if (!check('Pixel tag')->edit) d-none @endif"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('pixel.destroy', $pixels->id) }}" class="btn btn-danger btnDelete @if (!check('Pixel tag')->delete) d-none @endif"><i class="fas fa-trash"></i></a>
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
                    title: 'Pixel Tag Management',
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
