<header>
    <div class="top-navbar">
        <p class="m-0 text-center text-white py-1" style="background-color: #000d62; font-size: 14px !important;"><i class="fa-brands fa-hotjar"></i> 20% Discount for Priority Member</p>
    </div>
     <div class="header-top-wrapper" >
         <div class="" style="border-top: 1px solid gray; border-bottom: 1px solid gray;">

             <nav class="navbar navbar-expand-lg navbar-light ">
                 <div class="container-fluid">
                     <a href="{{ url('/') }}">
                         {{-- <img style="margin-left: 10px;" src="{{ $site_info->logo }}" alt=""> --}}
                         <h2 class="text-white" style="margin-left: 10px; width: 180px;">{{ $site_info->name }}</h2>
                     </a>
                     <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                         <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left: 10px;">
                             <li class="nav-item {{ (request()->is('all_product')) ? 'active' : '' }}">
                                 <a class="nav-link text-white" aria-current="page" href="{{ url('all_product') }}">SHOP</a>
                             </li>
                             <li class="nav-item {{ (request()->is('all_category')) ? 'active' : '' }}">
                                 <a class="nav-link text-white" href="{{ url('all_category') }}">ALL CATEGORY</a>
                             </li>

                             @foreach ($categories->take('4') as $category)
                                 <li lass="nav-item">
                                     <a class="nav-link text-white" href="{{ route('category', [$category->id]) }}"
                                        class="{{ Request::is("category-product/$category->id") ? 'active' : '' }}">
                                         <span style="font-size: 16px;"> {{ Str::upper($category->title) }} </span>
                                     </a>
                                 </li>
                                 <hr class="m-0">
                             @endforeach

                         </ul>
                         <div class="d-flex">
                             <div class="top-nav-right d-flex" style="margin-left: 10px;">
                                 @if(Route::has('login'))

                                     @auth
                                         <div class="btn-group">
                                             <button type="button" class="btn login-reg dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #006cb4">
                                                 <i class="fa-solid fa-lock"></i> Log out / Profile
                                             </button>
                                             <ul class="dropdown-menu text-center dropdown-menu-end">
                                                 <a href="#" class="btn login-reg btn-default btn-flat float-right btn btn-info text-white"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                     <i class="fa-solid fa-right-from-bracket"></i> Log out
                                                 </a>
                                                 <li><hr class="dropdown-divider"></li>
                                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                     @csrf
                                                 </form>

                                                 <a href="{{ route('login') }}" class="btn login-reg btn-primary" style="margin-right: 10px;"><i class="fa fa-sign-in"></i><span> Profile</span></a>

                                             </ul>
                                         </div>

                                     @else
                                         <div class="d-flex">
                                             <a href="{{ route('login') }}" class="btn login-reg btn-outline-primary text-white" style="margin-right: 10px;"><i class="fa fa-user"></i><span> Login</span></a>
                                             {{--<a href="{{ route('register') }}" class="btn btn-sm login-reg text-white text-white" style="background-color: #ff4444"><i class="fa fa-tag" aria-hidden="true"></i><span> Register</span></a>--}}
                                         </div>
                                     @endauth

                                 @endif

                             </div>
                         </div>
                     </div>
                 </div>
             </nav>

             {{--<div class="header-top-bar d-flex justify-content-between align-items-center">


                 <a href="{{ url('/') }}">
                     <img src="/{{ $site_info->logo }}" alt="" style="">
                     <h2 class="text-white" style="margin-left: 10px">{{ $site_info->name }}</h2>
                 </a>
                 <div id="search" class="search-bar">
                     <input type="text" name="search" value="" placeholder="Search for products">
                     <button class="search_plus btn btn-primary" aria-hidden="true"><i class="fa fa-search"></i></button>
                 </div>
                 <div id="search" class="search-bar">
                     <a class="navbar-brand" href="#">Renzicco</a>
                     <nav class="navbar navbar-expand-lg bg-body-tertiary">
                         <div class="container-fluid">
                             <button class="navbar-toggler border-white bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                 <span class="navbar-toggler-icon"></span>
                             </button>
                             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                 <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                     <li class="nav-item">
                                         <a class="nav-link active text-white" aria-current="page" href="{{ url('all_product') }}">SHOP</a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link text-white" href="{{ url('all_category') }}">ALL CATEGORY</a>
                                     </li>

                                     @foreach ($categories->take('4') as $category)
                                         <li lass="nav-item">
                                             <a class="nav-link text-white" href="{{ route('category', [$category->id]) }}"
                                                class="{{ Request::is("category-product/$category->id") ? 'active' : '' }}">
                                                 <span style="font-size: 16px;"> {{ Str::upper($category->title) }} </span>
                                             </a>
                                         </li>
                                         <hr class="m-0">
                                     @endforeach

                                     <li class="nav-item dropdown">
                                         <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                             PAGES
                                         </a>
                                         <ul class="dropdown-menu">
                                             <li><a class="dropdown-item" href="{{ url('order/checkout') }}">CHECK OUT</a></li>
                                             <li><a class="dropdown-item" href="{{ url('order/thank-you-page/ORD-DNVASAS8QF') }}">THANK YOU</a></li>
                                             <li><a class="dropdown-item" href="{{ url('product_details/5') }}">PRODUCT DETAILS</a></li>
                                         </ul>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link disabled text-white">Disabled</a>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </nav>

                 </div>
                  <div class="top-nav-right d-flex">
                      @if(Route::has('login'))

                          @auth
                              <div class="btn-group">
                                  <button type="button" class="btn login-reg dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #006cb4">
                                      <i class="fa-solid fa-lock"></i> Log out / Profile
                                  </button>
                                  <ul class="dropdown-menu text-center dropdown-menu-end">
                                      <a href="#" class="btn login-reg btn-default btn-flat float-right btn btn-info text-white"
                                         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                          <i class="fa-solid fa-right-from-bracket"></i> Log out
                                      </a>
                                      <li><hr class="dropdown-divider"></li>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                          @csrf
                                      </form>

                                      <a href="{{ route('login') }}" class="btn login-reg btn-primary" style="margin-right: 10px;"><i class="fa fa-sign-in"></i><span> Profile</span></a>

                                  </ul>
                              </div>

                          @else
                              <div class="d-flex">
                                  <a href="{{ route('login') }}" class="btn login-reg btn-outline-primary text-white" style="margin-right: 10px;"><i class="fa fa-user"></i><span> Login</span></a>
                                  <a href="{{ route('register') }}" class="btn btn-sm login-reg text-white text-white" style="background-color: #ff4444"><i class="fa fa-tag" aria-hidden="true"></i><span> Register</span></a>
                              </div>
                          @endauth

                      @endif

                    </div>
                 <div class="overlay-bg login-popup"></div>
             </div>--}}
         </div>
     </div>
 </header>


