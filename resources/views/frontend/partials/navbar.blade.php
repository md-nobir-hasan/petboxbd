<header >
<style>
    #side_navbar{
        display: none;
        width: 360px;
        background: #ffcc00;
        height: 100vh;
        padding-bottom: 20px;
        padding: 5px;
        font-size: 17px !important;
    }
    #side_navbar button{
        background: #ffcc00;
    }
    #side_navbar .accordion-body{
        background: #ffcc005e;
    }
    #side_navbar .link{
        color: black;
    }
    .accordion-body .link{
        border: 3px solid #ffcc005e;
    }
    #side_navbar .link-div.active{
        background: #9edc1a94
    }
    #side_navbar .link-div:hover{
        border: 3px solid #94baf3;
        background: #9edc1a94
    }
    #side_navbar .link-active{
        border: 3px solid #94baf3;
        background: #9edc1a94
    }

</style>
    {{-- Top Navbar  --}}
    <div class="top-navbar" style="background-color: white;">
        <div class="wrapper-container">
            <div class="row">
                <div class="col">
                    <p class="m-0 text-center text-white py-1 border_right" style="font-size: 13px !important;">
                        <a class="text-black" href="javascript:void(0)"><i class="fa-solid fa-location-dot"></i> {{ $site_info->address }}</a>
                    </p>
                </div>

                <div class="col">
                    <p class="m-0 text-center text-white py-1 border_right" style="font-size: 13px !important;">
                        <a class="text-black" href="tel:{{ $site_contact_info->phone }}"><i class="fa-solid fa-square-phone"></i> {{ $site_contact_info->phone }}</a>
                    </p>
                </div>
                @if (serviceCheck('Wishlist'))
                    <div class="col">
                        <p class="m-0 text-center text-white py-1 border_right" style="font-size: 13px !important;">
                            <a href="{{route('wishlist.index')}}">
                                <span class="text-dark"><i class="fa-solid fa-heart" style="color: #ffcc00;font-size: 20px;"></i> {{ count($wishlists) }}</span>
                            </a>
                        </p>
                    </div>
                @endif

                <div class="col">
                    <p class="m-0 text-center text-white py-1" style="font-size: 13px !important;">
                        <a class="mx-2 text-black" href="tel:{{ $site_contact_info->email }}"><i class="fa-solid fa-envelope"></i> {{ $site_contact_info->email }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- This main navbar for desktop  --}}
    <div class="wrapper-container nav_bar d-none d-lg-block" style="background-color: white">
        <nav class="navbar navbar-expand-lg bg-body-tertiary m-0 p-0">
            {{-- Side logo  --}}
            <a class="navbar-brand logo" href="{{ url('/') }}">
                <img src="/{{ $site_info->logo }}" alt="{{ $site_info->title }}">
            </a>

            {{-- Search option  --}}
            <div class="search search_one" style="width: 100%">
                <form class="d-flex input-group" role="search" style="width: 100%">
                    <input class="form-control rounded-0" type="search" placeholder="Search entire store here..." aria-label="Search">
                    <button class="btn rounded-0 border-0" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>

            {{-- Sidenavbar toggler  --}}
            <div class="side_navbar_toggler" id="side_navbar_toggler">
                <svg xmlns="http://www.w3.org/2000/svg" class="" style="height: 42px;color:black" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                  </svg>
            </div>
        </nav>
    </div>

    {{-- This main navbar for Mobile under 991px  --}}
    <div class="wrapper-container nav_bar d-lg-none" style="background-color: white">
        <nav class="navbar navbar-expand-lg bg-body-tertiary m-0 p-0">
            {{-- Side logo  --}}
            <a class="navbar-brand logo" href="{{ url('/') }}">
                <img src="/{{ $site_info->logo }}" alt="{{ $site_info->title }}">
            </a>

             {{-- Sidenavbar toggler  --}}
             <div class="side_navbar_toggler" id="side_navbar_toggler">
                <svg xmlns="http://www.w3.org/2000/svg" class="" style="height: 42px;color:black" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </div>
        </nav>
    </div>

 {{-- Search option  --}}
    <div class="py-3 d-lg-none border-top border-bottom" style="background-color: #f5f5f5;" style="">
        <div class="wrapper-container">
            <div class="search" style="width: 100%">
                <form class="d-flex input-group" role="search" style="width: 100%">
                    <input class="form-control rounded-0" type="search" placeholder="Search entire store here..." aria-label="Search">
                    <button class="btn rounded-0 border-0" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
    </div>

    {{-- Side Navbar  --}}
    <nav class="fixed" id="side_navbar">
        <div class="accordion accordion-flush" id="accordionFlushExample">


            {{-- Category option  --}}
            <div class="accordion-item " >
              <h2 class="accordion-header " id="flush-headingOne">
                <button class="accordion-button {{Request::is('product/sub-category/*') ? '': 'collapsed' }}  link-div"
                     @if (Request::is('product/sub-category/*')) aria-expanded="true" @else aria-expanded="false" @endif
                     type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-controls="flush-collapseOne">
                  Categories
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse {{Request::is('product/sub-category/*') ? 'show': '' }}" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body  p-0">
                    @foreach ($categories as $cat)
                        @if (count($cat->subcats)>0)
                            <div class="accordion accordion-flush" id="accordionFlushExample2">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne{{$cat->id}}">
                                        <button class="accordion-button {{Request::is("product/sub-category/$cat->id}/*") ? '': 'collapsed' }} ps-5" style="background: #fed700a8 !important" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{$cat->id}}"
                                            @if (Request::is('product/sub-category/*')) aria-expanded="true" @else aria-expanded="false" @endif
                                             aria-controls="flush-collapseOne{{$cat->id}}">
                                            {{$cat->title}}
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne{{$cat->id}}" class="accordion-collapse collapse {{Request::is("product/sub-category/$cat->id/*") ? 'show': '' }}" aria-labelledby="flush-headingOne{{$cat->id}}" data-bs-parent="#accordionFlushExample2">
                                        <div class="accordion-body p-0">
                                            @foreach ($cat->subcats as $subcat)
                                                {{-- <ul class="dropdown-menu dropdown-menu-dark ms-3">
                                                    <li> --}}
                                                        <a class="dropdown-item ps-5 fw-bold pt-3 link {{Request::is("product/sub-category/$cat->id/$subcat->id") ? 'link-active': '' }}" href="{{route('product.subcat',[$cat->id,$subcat->id])}}">{{$subcat->title}}</a>
                                                    {{-- </li>
                                                </ul> --}}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
              </div>
            </div>

            {{-- Pages  --}}
            @foreach ($pages as $page)
                <div class="ps-3  py-2 link-div {{Request::is("pages/$page->title") ? 'link-active': '' }}">
                    <a  class="text-decoration-none link " href="{{route('page',[$page->title])}}">{{$page->title}}</a>
                </div>
            @endforeach

            {{-- Login/ registration  --}}
            @if(Auth::user())
                <div class="ps-3  py-2 link-div">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                        @csrf
                       <button class="border-0 bg-transparent">Logout</button>
                    </form>
                </div>
            @else
                <div class="ps-3  py-2 link-div">
                    <a  class="text-decoration-none link {{Request::is("Login") ? 'link-active': '' }}" href="{{route('login')}}">Login</a>
                </div>
                <div class="ps-3  py-2 link-div">
                    <a  class="text-decoration-none link {{Request::is("registration") ? 'link-active': '' }}" href="{{route('register')}}">Registration</a>
                </div>
            @endif

          </div>
    </nav>
 </header>


