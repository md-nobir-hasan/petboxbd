<header style="">
    <div class="top-navbar" style="background-color: white;">
        <div class="wrapper-container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <p class="m-0 text-center text-white py-1 border_right" style="font-size: 13px !important;">
                        <a class="text-black" href="javascript:void(0)"><i class="fa-solid fa-location-dot"></i> {{ $site_info->address }}</a>
                    </p>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-4">
                    <p class="m-0 text-center text-white py-1 border_right" style="font-size: 13px !important;">
                        <a class="text-black" href="tel:{{ $site_contact_info->phone }}"><i class="fa-solid fa-square-phone"></i> {{ $site_contact_info->phone }}</a>
                    </p>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-4">
                    <p class="m-0 text-center text-white py-1" style="font-size: 13px !important;">
                        <a class="mx-2 text-black" href="tel:{{ $site_contact_info->email }}"><i class="fa-solid fa-envelope"></i> {{ $site_contact_info->email }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper-container nav_bar d-none d-lg-block" style="background-color: white">
        <nav class="navbar navbar-expand-lg bg-body-tertiary m-0 p-0">
            <a class="navbar-brand logo" href="{{ url('/') }}">
                <img src="/{{ $site_info->logo }}" alt="" style="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="search search_one d-md-none d-sm-none d-lg-block d-xs-none" style="width: 100%">
                <form class="d-flex input-group" role="search" style="width: 100%">
                    <input class="form-control rounded-0" type="search" placeholder="Search entire store here..." aria-label="Search">
                    <button class="btn rounded-0 border-0" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>

            <div class="d-flex log_reg" >
                @if(Route::has('login'))

                    @auth
                        <div class="btn-group">
                            <button type="button" class="btn login-reg rounded-0 dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #ffcc00">
                                {{--<i class="fa-solid fa-lock"></i>--}} Log out / Profile
                            </button>
                            <ul class="dropdown-menu text-center dropdown-menu-end">
                                <a href="#" class="btn btn-sm rounded-0 login-reg btn-default btn-flat float-right btn btn-info text-white"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{--<i class="fa-solid fa-right-from-bracket"></i>--}} Log out
                                </a>
                                <li><hr class="dropdown-divider"></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                                <a href="{{ route('login') }}" class="btn btn-sm login-reg btn-primary rounded-0" style="margin-right: 10px;">{{--<i class="fa fa-sign-in"></i>--}}<span> Profile</span></a>

                            </ul>
                        </div>

                    @else
                        <div class="d-flex">
                            <a href="{{ route('login') }}" class="btn login-reg text-white rounded-0" style="margin-right: 10px; background-color: #ffcc00">{{--<i class="fa fa-sign-in"></i>--}}<span> Login</span></a>
                            <a href="{{ route('register') }}" class="btn login-reg text-white rounded-0" style="background-color: #ffcc00">{{--<i class="fa fa-tag" aria-hidden="true"></i>--}}<span> Register</span></a>
                        </div>
                    @endauth

                @endif
            </div>
        </nav>
    </div>

    {{-- Another navbar  --}}
    <nav class="navbar fixed d-lg-none bg-1" id="navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">{{$site_info->title}}</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">{{$site_info->title}}</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body bg-1">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                @foreach ($categories as $cat)
                @if (count($cat->subcats)>0)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{$cat->title}}
                        </a>
                        @foreach ($cat->subcats as $subcat)
                            <ul class="dropdown-menu dropdown-menu-dark ms-3">
                                <li>
                                    <a class="dropdown-item" href="{{route('product.subcat',[$cat->id,$subcat->id])}}">{{$subcat->title}}</a>
                                </li>
                            </ul>
                        @endforeach
                    </li>
                @endif
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </nav>

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
 </header>


