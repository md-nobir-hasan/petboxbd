@extends('backend.layouts.app')

@section('title', 'Main Key Management')

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
                            <h4>View Main Key</h4>
                        </span>
                        <span class="float-right @if (!check('Main Keys')->add) d-none @endif">
                            <a href="{{ route('setting.setup.key.create') }}" class="btn btn-info">Add new Main Key</a>
                        </span>
                    </div>
                    <div class="card-body">
                        @include('backend.partial.flush-message')

                        <div class="table-responsive">
                            <table id="table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Mian Key Name</th>
                                        <th class="@if (!check('Main Keys')->edit && !check('Main Keys')->delete) d-none @endif">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($main_keys as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td class="text-middle py-0 align-middle @if (!check('Main Keys')->edit && !check('Main Keys')->delete) d-none @endif">
                                                <div class="btn-group">
                                                    <a href="{{ route('setting.setup.key.edit', [$value->id]) }}"
                                                        class="btn btn-dark btnEdit @if (!check('Main Keys')->edit) d-none @endif"><i class="fas fa-edit"></i></a>

                                                    <form action="{{ route('setting.setup.key.destroy', $value->id) }}" method="POST" class="@if (!check('Main Keys')->delete) d-none @endif">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btnDelete"><i class="fas fa-trash"></i></button>
                                                    </form>
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
                        title: 'Main Key Management',
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
