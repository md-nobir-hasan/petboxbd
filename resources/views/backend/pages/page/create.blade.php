@extends('backend.layouts.app')

@section('title', 'Page Management')

@push('third_party_stylesheets')
    <link rel="stylesheet" href="{{ asset('assets/backend/library/summernote/summernote.min.css') }}">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>Add page</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('page.index') }}" class="btn btn-info">Back</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form method="post" action="{{ route('page.store') }}"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="inputTitle" class="col-form-label">Page Title <span
                                                class="text-danger">*</span></label>
                                        <input id="inputTitle" type="text" name="title" placeholder="Enter Page Title"
                                            value="{{ old('title') }}" class="form-control">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="page_design" class="col-form-label">Page Design <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control summernote" id="page_design" name="page_design">{{ old('page_design') }}</textarea>
                                        @error('page_design')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
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
    <script src="{{ asset('assets/backend/library/summernote/summernote.min.js') }}"></script>
@endpush
@push('page_scripts')
<script>
      $('.summernote').summernote({
                placeholder: "Write short description.....",
                tabsize: 2,
                height: 100
            });
</script>
@endpush
