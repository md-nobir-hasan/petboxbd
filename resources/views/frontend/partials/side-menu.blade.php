{{--
<div class="menu-wrapper" id="side_nav">
    <a href="{{ route('home') }}">
        <div class="logo">
 <img src="{{asset('assets/images/default/site-logo.png')}}"
                    alt="Babycare" title="Babycare" height="60px">

            <h2 class="text-white" style="text-align: left; margin-left: 25px;"> {{ $site_info->name }}</h2>
        </div>
    </a>
    <div class="menu-nav" style="padding-top: 7px;">
        <nav class="nav" class="">
            <ul class="responsive-menu w-100">
                <li class="text-white border-top border-dark"><h5 style="margin-top: 15px;"><img src="/cat/default.png" style="padding-left: 20px; width: 50px" alt="">CATEGORIES:</h5></li>
                <hr class="m-0">
                @foreach ($categories as $category)
                    <li class="has-child py-1">
                        <a href="{{ route('category', [$category->id]) }}"
                            class="{{ Request::is("category-product/$category->id") ? 'active' : '' }}">
                            @if (isset($category->img))
                                <img src="/{{ $category->img }}" alt="{{ $category->title }}" class="rounded"
                                    height="35px" width="35px">
                            @endif
                            <span style="font-size: 18px;">{{ $category->title }}</span>
                        </a>
                    </li>
                    <hr class="m-0">
                @endforeach
            </ul>
        </nav>
    </div>
    <div class="overlay"></div>
</div>
--}}
