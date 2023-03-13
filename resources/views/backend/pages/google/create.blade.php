@extends('backend.layouts.app')

@section('title', 'Google Management')

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
                            <h4>Add google tag</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('google.index') }}" class="btn btn-info">Back</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form method="post" action="{{ route('google.store') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="gtag_header" class="col-form-label">Google tag in header <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" name="gtag_header" id="gtag_header" rows="5" value="{{ old('gtag_header') }}" placeholder="Enter google tag header"></textarea>
                                        @error('gtag_header')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="gtag_footer" class="col-form-label">Google tag in footer <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" name="gtag_footer" id="gtag_footer" rows="5" value="{{ old('gtag_footer') }}" placeholder="Enter google tag footer"></textarea>
                                        @error('gtag_footer')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="status" class="col-form-label">Status <span
                                                class="text-danger">*</span></label>
                                        <select name="status" class="form-control">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
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
