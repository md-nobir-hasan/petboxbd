

<footer class="page-footer" style="margin-top: 100px;">
    <div class="footer-style-1">

        <div class="footer-top">
            <div class="wrapper-container">
                <div class="row justify-content-end align-items-center">
                    <div class="subcribe-footer-content col-lg-8">
                        <div class="subcribe-footer-title">Subscribe Our Newsletter</div>
                        <div class="block-subscribe-footer">
                            <form class="form subscribe" novalidate="novalidate" action="" method="post" id="newsletter-footer-validate-detail">

                                <div class="newsletter-content">
                                    <div class="input-group btn_input">
                                        <input type="email" name="email" class="form-control" placeholder="Your email address" aria-label="Username" aria-describedby="basic-addon1">
                                        <button class="input-group-text" id="basic-addon1">Subscribe</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-middle">
            <div class="wrapper-container">
                <div class="row justify-content-end">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="block-footer">
                                    <div class="block-footer-title">Account</div>
                                    <div class="block-footer-content">
                                        <ul>
                                            <li><a href="#">Policy</a></li>
                                            <li><a href="#">System Program</a></li>
                                            <li><a href="#">Return</a></li>
                                            <li><a href="#">Site Map</a></li>
                                            <li><a href="#">Healthy</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="block-footer">
                                    <div class="block-footer-title">Information</div>
                                    <div class="block-footer-content">
                                        <ul>
                                            <li><a href="#">Contact Us</a></li>
                                            <li><a href="#">Shipping &amp; Return</a></li>
                                            <li><a href="#">Customer FAQ</a></li>
                                            <li><a href="#">Care Tips</a></li>
                                            <li><a href="#">Size Charts</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="block-footer">
                                    <div class="logo-ft"><a href="#"><img src="{{ asset($site_info->logo) }}" alt=""></a></div>
                                    <div class="block-footer-content footer-contact">
                                        <ul>
                                            <li class="address">Location: {{ $site_info->address }}</li>
                                            <li class="email">Email: {{ $site_contact_info->email }}</li>
                                        </ul>
                                    </div>
                                    {{--<div class="social-footer">
                                        <ul>
                                            <li><a title="Facebook" href="https://www.facebook.com/MagenTech"><img src="http://magento2.magentech.com/themes/sm_petshop/pub/media/wysiwyg/footer/icon-facebook.png" alt=""></a></li>
                                            <li><a title="Twitter" href="https://twitter.com/MagenTech"><img src="http://magento2.magentech.com/themes/sm_petshop/pub/media/wysiwyg/footer/icon-twitter.png" alt=""></a></li>
                                            <li><a title="Instagram" href="#"> <img src="http://magento2.magentech.com/themes/sm_petshop/pub/media/wysiwyg/footer/icon-instagram.png" alt=""> </a></li>
                                            <li><a title="Youtube" href="https://www.youtube.com/user/smartaddons"> <img src="http://magento2.magentech.com/themes/sm_petshop/pub/media/wysiwyg/footer/icon-youtube.png" alt=""></a></li>
                                        </ul>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="wrapper-container">
                <div class="row justify-content-between">
                    <div class="col-lg-4 work-time_col"> <div class="work-time">
                            <h3 class="title">Working Time</h3>
                            <ul>
                                <li>Saturday
                                    <p class="time">10:00 AM - 10:00 PM</p>
                                </li>
                                <li>Sunday
                                    <p class="time">10:00 AM - 10:00 PM</p>
                                </li>
                                <li>Monday
                                    <p class="time">10:00 AM - 10:00 PM</p>
                                </li>
                                <li>Tuesday
                                    <p class="time">10:00 AM - 10:00 PM</p>
                                </li>
                                <li>Wednesday
                                    <p class="time">10:00 AM - 10:00 PM</p>
                                </li>
                                <li>Thursday
                                    <p class="time">10:00 AM - 10:00 PM</p>
                                </li>
                                <li>Friday
                                    <p class="time" style="padding-right: 88px">OFF DAY</p>
                                </li>

                            </ul>
                            <h4>Emergency Number</h4>
                            <h2>{{ $site_contact_info->phone }}</h2>
                        </div></div>
                    <div class="col-lg-9 p-0">
                        <address>All Rights Reserved petbox. Designed & Develope by <a class="text-decoration-none" href="javascript:void(0)">Security First</a>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="overlay"></div>
<div class="footer-bottom-bar">
    <div class="bottom-bar d-flex flex-wrap justify-content-around align-items-center">
        <a href="#" class="bottom-item offer">
            <div class="bottom-item-icon">
                <i class="fa fa-bookmark" aria-hidden="true"></i>
            </div>
            <span class="text">Offers</span>
        </a>
        {{-- href="https://m.me/babycare.bangladesh" --}}
        <a href="javascript::void(0)" class="bottom-item barnd">
            <div class="bottom-item-icon">
                <i class="fa-brands fa-facebook-messenger"></i>
            </div>
            <span class="text">Messenger</span>
        </a>
          {{-- Wishlist  --}}
        @if (serviceCheck('Wishlist'))
            {{-- <div class="col"> --}}
            <a href="{{route('wishlist.index')}}" class="pb-2">
                <p class="m-0 text-center text-white" style="font-size: 13px !important;">
                    <span class="text-dark">
                        <i class="fa-solid fa-heart" style="color: #ff0000;font-size: 30px;"></i>
                            <span class="position-absolute" style="top: 5px">{{ count($wishlists) }}</span>
                    </span>
                </p>
            </a>
            {{-- </div> --}}
        @endif
        <div class="bottom-item cart mc-toggler" id="cart_mobile">
            <a href="{{ route('checkout') }}">
                <div class="bottom-item-icon">
                    <i class="fa fa-shopping-cart shopping-cart"></i>
                </div>
                <span class="text">Cart</span>
                <span class="value count-mobile bg-warning cart-product-count">0</span>
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

