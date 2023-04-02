@extends('backend.layouts.app')

@section('title', 'Sub-category Management')

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
                            <h4>View Sub-category</h4>
                        </span>
                        <span class="float-right @if (!check('Sub-category')->add) d-none @endif">
                            <a href="{{ route('subcat.create') }}" class="btn btn-info">Add new Sub-category</a>
                        </span>
                    </div>
                    <div class="card-body">
                        @include('backend.partial.flush-message')

                        <div class="table-responsive">
                            <table id="table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Category Name</th>
                                        <th>Sub-category Name</th>
                                        <th>Status</th>
                                        <th class="@if (!check('Sub-category')->edit && !check('Sub-category')->delete) d-none @endif"
                                            id="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($subcats as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->cat->title }}</td>
                                            <td>{{ $value->title }}</td>
                                            <td>{{ $value->status }}</td>
                                            <td class="text-middle py-0 align-middle @if (!check('Sub-category')->edit && !check('Sub-category')->delete) d-none @endif">
                                                <div class="btn-group">
                                                    <a href="{{ route('subcat.edit', $value->id) }}"
                                                        class="btn btn-dark btnEdit @if (!check('Sub-category')->edit) d-none @endif"><i class="fas fa-edit"></i></a>
                                                    {{-- @endif --}}
                                                    {{-- @if (Auth::user()->can('delete subcat') || Auth::user()->role->id == 1) --}}
                                                    <a href="{{ route('subcat.destroy', $value->id) }}"
                                                        class="btn btn-danger btnDelete @if (!check('Sub-category')->delete) d-none @endif"><i class="fas fa-trash"></i></a>
                                                    {{-- @endif --}}
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
