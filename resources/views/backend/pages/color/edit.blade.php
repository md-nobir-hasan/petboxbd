@extends('backend.layouts.app')

@section('title', 'Brand Management')

@push('third_party_stylesheets')
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
                            <h1>Update product size</h1>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('color.index') }}" class="btn btn-info">Back</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form method="post" action="{{ route('color.update', $color->id) }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="c_name" class="col-form-label">Product size <span
                                                class="text-danger">*</span></label>
                                        <input id="c_name" type="text" name="c_name" placeholder="Enter product color name"
                                               value="{{ $color->c_name }}" class="form-control">
                                        @error('c_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="c_code" class="col-form-label d-block">Chose color <span
                                                class="text-danger">*</span></label>
                                        <input id="c_code" type="color" name="c_code" placeholder="Enter product color name"
                                               value="{{ $color->c_code }}">
                                        @error('c_code')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="status" class="col-form-label">Status <span
                                                class="text-danger">*</span></label>
                                        <select name="status" class="form-control">
                                            <option value="active" {{ $color->status == 'active' ? 'selected':'' }}>Active</option>
                                            <option value="inactive" {{ $color->status == 'inactive' ? 'selected':'' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <button type="reset" class="btn btn-warning">Reset</button>
                                        <button class="btn btn-success" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('third_party_scripts')
    <script src="{{ asset('assets/js/DataTable/datatables.min.js') }}"></script>
@endpush

@push('page_scripts')
    <script></script>
@endpush
