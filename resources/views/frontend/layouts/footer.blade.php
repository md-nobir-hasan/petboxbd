{{--<footer class="footer">
    <footer class="wrapper-container">
        <div class="footer-content d-flex flex-wrap">
            <div class="footer-widget">
                <h4 class="title">Customer Care</h4>
                <ul>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Shipping &amp; Delivery</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="footer-widget">
                <h4 class="title">Company Information</h4>
                <ul>
                    <li><a href="#">Refund and Return Policy</a></li>
                    <li><a href="#">Terms and Conditions</a></li>
                    <li><a href="#">Cashback Terms & Conditions</a></li>
                </ul>
            </div>
            <div class="copy-right">
                <p class="m-0">
                    <span class="d-block d-md-inline">All Rights Reserved
                        <strong>--}}{{--{{ ucfirst($site_info->name) }}--}}{{--</strong></span>
                    <span class="d-none d-md-inline"> | </span>
                    <span class="d-block d-md-inline">Designed & developed by <strong>Security First</strong></span>
                    <span class="d-none d-md-inline"> | </span>
                    <span class="d-block d-md-inline">Powdered by <strong>e-Business Clinic</strong></span>
                </p>
            </div>
        </div>
        </div>
    </footer>
</footer>--}}

<footer class="footer container-fluid mt-0">
    <div class="container-fluid">
        <div class="pb-4">

            <div class="d-grid gap-2 py-3 mb-3">
                <button class="btn rounded-0 py-2 text-center footer_button" type="button"><h5 class="m-0"><i class="fa-solid fa-list"></i> TRUSTWORTHY SHOPPING EXPERIENCE</h5></button>
            </div>

            <div class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 g-3 mb-3">
                <div class="col d-flex align-items-stretch">
                    <div class="card footer_card" >
                        <div class="card-body text-center align-items-center d-flex flex-column">
                            <img src="footer-image/delivery-icon.png" alt="" style="width: 50px;">
                            <h4 class="card-title mt-3"><strong>Fastest Delivery</strong></h4>
                            <p class="card-text">We providing Same Day (8 Hours) & Next Day Delivery Service besides regular delivery.</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex align-items-stretch">
                    <div class="card footer_card" >
                        <div class="card-body text-center align-items-center d-flex flex-column">
                            <img src="footer-image/customer-support-icon.png" alt="" style="width: 50px;">
                            <h4 class="card-title mt-3"><strong>24/7 Customer Support</strong></h4>
                            <p class="card-text">We Provide 24/7 friendly customer service.</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex align-items-stretch">
                    <div class="card footer_card" >
                        <div class="card-body text-center align-items-center d-flex flex-column">
                            <img src="footer-image/premium-quality-icon.png" alt="" style="width: 50px;">
                            <h4 class="card-title mt-3"><strong>Premium Quality</strong></h4>
                            <p class="card-text">We Never Compromise with quality. 100% Deshi handloom saree</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex align-items-stretch">
                    <div class="card footer_card" >
                        <div class="card-body text-center align-items-center d-flex flex-column">
                            <img src="footer-image/Easy-Return.png" alt="" style="width: 50px;">
                            <h4 class="card-title mt-3"><strong>Easy Return</strong></h4>
                            <p class="card-text">Sharez Provide hassle free friendly return service.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer_text" style="background-color: #f6f9ff">
            <hr class="mt-0" style="color: #a7a7a7;">
            <div class="row pt-4 mx-2">
                <div class="col-lg-3 col-md-6 col-sm-6 ">
                    <h5 class="title " style="color: #2c3e50;">CONTACT US</h5>
                    <ul>
                        <li>
                            <i class="fa fa-location" style="color: #0d21a1 !important;"></i><a class="text-secondary fs" href="javascript:void(0)"> <small> {{ $site_info->address }}</small></a></li>
                        <li>
                        <li>
                            <i class="fa fa-phone" style="color: #0d21a1 !important;"></i><a class="text-secondary fs" href="tel:{{ $site_contact_info->phone }}"> <small> {{ $site_contact_info->phone }}</small></a></li>
                        <li>
                            <i class="fa fa-envelope" style="color: #0d21a1 !important;"></i><a class="text-secondary fs" href="mailto:{{ $site_contact_info->email }}"> <small> {{ $site_contact_info->email }}</small></a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mt-3 mt-sm-0 mt-md-0 mt-lg-0">
                    <h5 class="title " style="color: #2c3e50;">COMPANY INFORMATION</h5>
                    <ul class="">
                        <li><a class="text-secondary" href="javascript:void(0)"><small>Refund and Return Policy</small></a></li>
                        <li><a class="text-secondary" href="javascript:void(0)"><small>Terms and Conditions</small></a></li>
                        <li><a class="text-secondary" href="javascript:void(0)"><small>Cashback Terms &amp; Conditions</small></a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mt-3 mt-lg-0">
                    <h5 class="title " style="color: #2c3e50;">CUSTOMER CARE</h5>
                    <ul class="">
                        <li><a class="text-secondary" href="javascript:void(0)"><small>Contact Us</small></a></li>
                        <li><a class="text-secondary" href="javascript:void(0)"><small>About Us</small></a></li>
                        <li><a class="text-secondary" href="javascript:void(0)"><small>Shipping &amp; Delivery</small></a></li>
                        <li><a class="text-secondary" href="javascript:void(0)"><small>Privacy Policy</small></a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mt-3 mt-lg-0">
                    <h5 class="title text-light" style="color: #2c3e50 !important;">QUICK LINKS</h5>
                    <ul class="">
                        <li><a class="text-secondary" href="javascript:void(0)"><small>Refund and Return Policy</small></a></li>
                        <li><a class="text-secondary" href="javascript:void(0)"><small>Terms and Conditions</small></a></li>
                        <li><a class="text-secondary" href="javascript:void(0)"><small>Cashback Terms &amp; Conditions</small></a>
                        <li><a class="text-secondary" href="javascript:void(0)"><small>Cashback Terms &amp; Conditions</small></a>
                        </li>
                    </ul>
                </div>
                <div class="copy-right">
                    <p class="m-0 py-2"><small style="color: #6c7793;">All Rights Reserved</small><a href="{{ url('/') }}"><strong><small style="color: #0d21a1 !important;"> {{ $site_info->name }}</small></strong></a> <span class="text-dark">|</span><small style="color: #6c7793;"> Designed And developed by <strong>Web Foundation It</strong></small></a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="overlay"></div>
<div class="footer-bottom-bar">
    <div class="bottom-bar d-flex flex-wrap justify-content-around">
        <a href="{{ url('/') }}" class="bottom-item offer">
            <div class="bottom-item-icon">
                <i class="fa fa-home text-light" aria-hidden="true"></i>
            </div>
            <span class="text text-light">Home</span>
        </a>
        {{-- href="https://m.me/babycare.bangladesh" --}}
        <a href="javascript::void(0)" class="bottom-item barnd">
            <div class="bottom-item-icon">
                <i class="fa-brands fa-facebook-messenger text-light"></i>
            </div>
            <span class="text text-light">Messenger</span>
        </a>
        <div class="bottom-item cart mc-toggler" id="cart_mobile">
            <a href="{{ route('checkout') }}">
                <div class="bottom-item-icon">
                    <i class="fa fa-shopping-cart shopping-cart text-light"></i>
                </div>
                <span class="text text-light">Cart</span>
                <span class="value cart-product-count count-mobile bg-warning">0</span>
            </a>
        </div>
    </div>
</div>
<div id="fb-root"></div>

<div class="fb-customerchat" attribution=setup_tool page_id="377420772353763" theme_color="#005662">
</div>

{{-- Bootstrap  js --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

{{-- jQuery  --}}
<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

{{-- jQuery JS --}}
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

{{-- Custom JS --}}
@include('frontend.partials.js')

{{-- in page js  --}}
@stack('custom-js')


{{-- Facebook google tag or link here  --}}
{!! $google_tag ? $google_tag->gtag_footer : '' !!}
{!! $pixel_tag ? $pixel_tag->ptag_footer : '' !!}
{{-- End Facebook google tag or link  --}}

@stack('g_fb_js')
</body>

