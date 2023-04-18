@extends('frontend.layouts.app')
@push('custom-css')

@endpush
@section('page_conent')
   <div class="px-5 pb-4" style="padding-top: 126px">
        {!! $page->page_design !!}
   </div>
@endsection

