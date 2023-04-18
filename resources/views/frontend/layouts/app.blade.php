@php
    $categories = App\Models\Category::with('subcats')->get();
    $google_tag = App\Models\GoogleTag::first();
    $pixel_tag = App\Models\PixelTag::first();
@endphp
<!DOCTYPE html>
<html dir="ltr" lang="bn">

@include('frontend.layouts.header')

<body class="common-home">
    {{-- notification  --}}
    @include('frontend.partials.notification')
    {{-- End notification  --}}

    {{-- menu navbar toggle  --}}
    <div class="menu-nav-bar">
        <div class="wrapper-container">
            <div id="nav-toggler"><span></span></div>
        </div>
    </div>
    {{-- End menue navbar toggle  --}}

    <!-- Navbar Start -->
    @include('frontend.partials.navbar')
    <!-- Navbar End -->


    <!-- Side Navbar Start -->
    @include('frontend.partials.side-menu')
    <!-- Navbar End -->

    {{-- Shopping card  --}}
    @include('frontend.partials.shopping-card')
    {{-- End shopping card  --}}

    {{-- Shopping card  --}}
    @include('frontend.partials.mini-cart')
    {{-- End shopping card  --}}

    {{-- This modal for product size and color  --}}
    @if (!serviceCheck('No Color & Size'))
        @include('frontend.partials.modal-pcs')
    @endif
    {{-- End shopping card  --}}

    <div class="toastr-div">

    </div>
    @yield('page_conent')

    @include('frontend.layouts.footer')

    </html>
