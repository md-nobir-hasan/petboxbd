@extends('backend.layouts.app')

@section('title', 'Sub-category Management')

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
                            <h1>Add Sub-category</h1>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('subcat.index') }}" class="btn btn-info">Back</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form method="post" action="{{ route('subcat.store') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="cat_id" class="col-form-label">Category <span
                                                class="text-danger">*</span></label>
                                        <select name="cat_id" id="cat_id" class="form-control">
                                            <option value="" hidden>Select Category</option>
                                            @foreach ($cats as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('cat_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="inputTitle" class="col-form-label">Title <span
                                                class="text-danger">*</span></label>
                                        <input id="inputTitle" type="text" name="title" placeholder="Enter title"
                                            value="{{ old('title') }}" class="form-control">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- <div class="form-group">
                                        <label for="img" class="col-form-label">Sub-category Logo <span
                                                class="text-danger">*</span></label>
                                        <input id="img" type="file" name="img" placeholder="Enter logo"
                                            value="{{ old('img') }}" class="form-control">
                                        @error('img')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div> --}}

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
