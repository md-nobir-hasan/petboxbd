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
                            <h1>View Banner Image</h1>
                        </span>
                        <span class="float-right @if (!check('Banner Image')->add) d-none @endif">
                            <a href="{{ route('banner.create') }}" class="btn btn-info">Add new Banner</a>
                        </span>
                    </div>
                    <div class="card-body">

                        @include('backend.partial.flush-message')

                        <div class="table-responsive">
                            <table id="table" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Slider image</th>
                                    <th>Status</th>
                                    <th class="@if (!check('Banner Image')->edit && !check('Banner Image')->delete) d-none @endif"
                                        id="action">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($banners as $banner)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img style="width: 100px;" src="/{{ $banner->image }}" alt="">
                                        </td>
                                        <td>{{ $banner->status }}</td>
                                        <td class="text-middle py-0 align-middle @if (!check('Banner Image')->edit && !check('Banner Image')->delete) d-none @endif">
                                            <div class="btn-group">
                                                <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-dark btnEdit @if (!check('Banner Image')->edit) d-none @endif"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('banner.destroy', $banner->id) }}" class="btn btn-danger btnDelete @if (!check('Banner Image')->delete) d-none @endif"><i class="fas fa-trash"></i></a>
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
