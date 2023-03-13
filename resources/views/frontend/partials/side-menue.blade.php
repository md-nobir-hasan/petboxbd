<div class="menu-wrapper" id="side_nav">
    <a href="{{ route('home') }}" id="side_logo">
        <div class="logo" >
             <img src="/{{ $site_info->logo }}"
                    alt="{{ $site_info->title }}" title="{{ $site_info->title }}">
            <h1> {{ $site_info->title }}</h1>
        </div>
    </a>
    <div class="menu-nav">
        <nav class="nav">
            <ul class="responsive-menu w-100">
                @foreach ($categories as $category)
                    <li class="has-child">
                        <a href="{{ route('category', [$category->id]) }}"
                            class="{{ Request::is("category-product/$category->id") ? 'active' : '' }}">
                            @if (isset($category->img))
                                <img class="cat_img" src="/{{ $category->img }}" alt="{{ $category->title }}" class="rounded">
                            @endif
                            <span>{{ $category->title }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>

    <div class="overlay"></div>
</div>
