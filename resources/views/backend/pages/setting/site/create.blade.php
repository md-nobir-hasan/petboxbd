@extends('backend.layouts.app')

@section('title', 'site Management')

@push('page_css')
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                        @include('backend.partial.flush-message')
                        <form action="{{route('setting.site.store')}}" method="POST">
                            @csrf
                            @foreach ($services as $key => $service)
                            <hr> <h2>{{ $service->first()->mainKey->name }}</h2> <hr>
                                <div class="custom-control custom-checkbox d-flex justify-content-around my-1 mr-sm-2 @if(!$loop->last) mb-5 @endif">
                                    @foreach ($service as $value)
                                        <div>
                                            <input type="checkbox" name="service_id[{{$key.$loop->index}}]"
                                                class="custom-control-input" id="add{{ $key.$loop->index }}" value="{{ $value->id }}"
                                                @if ($value->hasService()) checked @endif>
                                            <label class="custom-control-label ml-2"
                                                for="add{{ $key.$loop->index }}">{{ $value->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                            <hr class=" mt-5">
                            <button class="btn btn-info w-100">Save Settings</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
