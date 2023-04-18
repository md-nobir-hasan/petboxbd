@if (check('Home'))
    <li class="nav-item">
        <a href="{{ route('admin') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>Home</p>
        </a>
    </li>
@endif

{{-- Category Management  --}}

@if ($n = check('Category'))
    <li class="nav-item {{ Request::is('category/*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="fa fa-list"></i>
            <p>
                Category
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if ($n->show)
                <li class="nav-item">
                    <a href="{{ route('category.index') }}"
                        class="nav-link {{ Request::is('category/index') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Show Category</p>
                    </a>
                </li>
            @endif
            @if ($n->add)
                <li class="nav-item">
                    <a href="{{ route('category.create') }}"
                        class="nav-link {{ Request::is('category/create') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Add Category</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif

{{-- Sub-category Management  --}}
@if ($n =check('Sub-category'))
    <li class="nav-item {{ Request::is('subcat/*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="fa-solid fa-outdent"></i>
            <p>
                Sub-category
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if ($n->show)
                <li class="nav-item">
                    <a href="{{ route('subcat.index') }}"
                        class="nav-link {{ Request::is('subcat/index') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Show Sub-category</p>
                    </a>
                </li>
            @endif
            @if ($n->add)
                <li class="nav-item">
                    <a href="{{ route('subcat.create') }}"
                        class="nav-link {{ Request::is('subcat/create') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Add Sub-category</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif

{{-- Slider and banner images  --}}
@if (check('Images'))
    <li
        class="nav-item {{ Request::is('slider/*') ? 'menu-open' : '' }} {{ Request::is('banner/*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="fa-solid fa-image"></i>
            <p>
                Images
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if ($n = check('slider Image'))
            <li class="nav-item">
                <a href="{{ route('slider.index') }}"
                    class="nav-link {{ Request::is('slider/index') ? 'active' : '' }}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Slider images</p>
                </a>
            </li>
            @endif
            @if ($n = check('Banner Image'))
                <li class="nav-item">
                    <a href="{{ route('banner.index') }}"
                        class="nav-link {{ Request::is('banner/index') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Banner images</p>
                    </a>
                </li>
            @endif

        </ul>
    </li>
@endif


{{-- Shipping Management  --}}
@if ($n =check('Shipping'))
    <li class="nav-item {{ Request::is('shipping/*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="fa-solid fa-truck-fast"></i>
            <p>
                Shipping
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if ($n->show)
                <li class="nav-item">
                    <a href="{{ route('shipping.index') }}"
                        class="nav-link {{ Request::is('shipping/index') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Show Shipping</p>
                    </a>
                </li>
            @endif
            @if ($n->add)
                <li class="nav-item">
                    <a href="{{ route('shipping.create') }}"
                        class="nav-link {{ Request::is('shipping/create') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Add Shipping</p>
                    </a>
                </li>
            @endif

        </ul>
    </li>
@endif
{{-- Page Management  --}}
@if ($n =check('Page'))
    <li class="nav-item {{ Request::is('page/*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="fa-solid fa-truck-fast"></i>
            <p>
                Page
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if ($n->show)
                <li class="nav-item">
                    <a href="{{ route('page.index') }}"
                        class="nav-link {{ Request::is('page/index') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Show Page</p>
                    </a>
                </li>
            @endif
            @if ($n->add)
                <li class="nav-item">
                    <a href="{{ route('page.create') }}"
                        class="nav-link {{ Request::is('page/create') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Add Page</p>
                    </a>
                </li>
            @endif

        </ul>
    </li>
@endif

{{-- Brand  Management  --}}
@if ($n =check('Brand'))
    <li class="nav-item {{ Request::is('brand/*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="fa-solid fa-business-time"></i>
            <p>
                Brand
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if ($n->show)
                <li class="nav-item">
                    <a href="{{ route('brand.index') }}"
                        class="nav-link {{ Request::is('brand/index') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Show Brand</p>
                    </a>
                </li>
            @endif
            @if ($n->add)
                <li class="nav-item">
                    <a href="{{ route('brand.create') }}"
                        class="nav-link {{ Request::is('brand/create') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Add Brand</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif







{{-- Product setup menu  --}}
@if (check('Images'))
    <li
        class="nav-item {{ Request::is('size/*') ? 'menu-open' : '' }} {{ Request::is('color/*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="fa-solid fa-wrench"></i>
            <p>
                Product setup
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if ($n = check('Slider Image'))
                <li class="nav-item">
                    <a href="{{ route('size.index') }}"
                       class="nav-link {{ Request::is('size/index') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Size</p>
                    </a>
                </li>
            @endif
            @if ($n = check('Banner Image'))
                <li class="nav-item">
                    <a href="{{ route('color.index') }}"
                       class="nav-link {{ Request::is('color/index') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Color</p>
                    </a>
                </li>
            @endif

        </ul>
    </li>
@endif

{{-- Product Management  --}}
@if ($n =check('Product'))
    <li class="nav-item {{ Request::is('product/*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="fa-brands fa-product-hunt"></i>
            <p>
                Product
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if ($n->show)
                <li class="nav-item">
                    <a href="{{ route('product.index') }}"
                        class="nav-link {{ Request::is('product/index') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Show Product</p>
                    </a>
                </li>
            @endif
            @if ($n->add)
                <li class="nav-item">
                    <a href="{{ route('product.create') }}"
                        class="nav-link {{ Request::is('product/create') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Add Product</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif

{{-- Order Management  --}}
@if ($n =check('Order'))
    <li class="nav-item {{ Request::is('order/*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="fa-solid fa-money-bill-transfer"></i>
            <p>
                Order
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if ($n->show)
                <li class="nav-item">
                    <a href="{{ route('order.index') }}"
                        class="nav-link {{ Request::is('order/index') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Show Order</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif

{{-- Payment  --}}
@if ($n =check('Payment System'))
    <li class="nav-item {{ Request::is('payment/*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="fa-solid fa-cart-shopping"></i>
            <p>
                Payment System
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
          @if ($n->show)
            <li class="nav-item">
                <a href="{{ route('payment.index') }}"
                    class="nav-link {{ Request::is('payment/index') ? 'active' : '' }}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Show Payment</p>
                </a>
            </li>
          @endif
          @if ($n->add)
            <li class="nav-item">
                <a href="{{ route('payment.create') }}"
                    class="nav-link {{ Request::is('payment/create') ? 'active' : '' }}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Add Payment</p>
                </a>
            </li>
          @endif

        </ul>
    </li>
@endif

{{-- Customer contact  --}}
@if ($n =check('Customer Contact'))
    <li class="nav-item {{ Request::is('customer/*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="fa-sharp fa-solid fa-id-card"></i>
            <p>
                Customer contact
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
           @if ($n->show)
            <li class="nav-item">
                <a href="{{ route('customer.customer') }}"
                    class="nav-link {{ Request::is('customer/customer') ? 'active' : '' }}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Show Customer</p>
                </a>
            </li>
           @endif
        </ul>
    </li>
@endif

{{-- Add Order status   --}}
@if ($n =check('Order Status'))
    <li class="nav-item {{ Request::is('order-status/*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="fa-brands fa-first-order"></i>
            <p>
                Order Status
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if ($n->show)
                <li class="nav-item">
                    <a href="{{ route('order-status.index') }}"
                       class="nav-link {{ Request::is('order-status/index') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Show Order status</p>
                    </a>
                </li>
            @endif
            @if ($n->add)
                <li class="nav-item">
                    <a href="{{ route('order-status.create') }}"
                       class="nav-link {{ Request::is('order-status/create') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Add Order status</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif

{{-- Pixel tag   --}}
@if ($n =check('Pixel tag'))
    <li class="nav-item {{ Request::is('pixel/*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="fa-brands fa-pix"></i>
            <p>
                Pixel tag
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if ($n->show)
                <li class="nav-item">
                    <a href="{{ route('pixel.index') }}"
                       class="nav-link {{ Request::is('pixel/index') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Show pixel tag</p>
                    </a>
                </li>
            @endif
            @if ($n->add)
                <li class="nav-item">
                    <a href="{{ route('pixel.create') }}"
                       class="nav-link {{ Request::is('pixel/create') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Add pixel tag</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif

{{-- Google tag   --}}
@if ($n =check('Google tag'))
    <li class="nav-item {{ Request::is('google/*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="fa-brands fa-google"></i>
            <p>
                Google tag
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if ($n->show)
                <li class="nav-item">
                    <a href="{{ route('google.index') }}"
                       class="nav-link {{ Request::is('google/index') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Show pixel tag</p>
                    </a>
                </li>
            @endif
            @if ($n->add)
                <li class="nav-item">
                    <a href="{{ route('google.create') }}"
                       class="nav-link {{ Request::is('google/create') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Add pixel tag</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif

{{-- Setting  --}}
@if (check('Setting'))
    <li class="nav-item {{ Request::is('setting/*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="fa-solid fa-gear"></i>
            <p>
                Setting
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if (check('Setting Setup'))
            <li class="nav-item {{ Request::is('setting/setup*') ? 'menu-open' : '' }}">
                <a href="#"
                    class="nav-link">
                    <i class="fa-solid fa-wrench"></i>
                    <p>Setup <i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    @if ($n = check('Main Keys'))
                    <li class="nav-item {{ Request::is('setting/setup/mainKey*') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link">
                            <i class="fa-solid fa-key"></i>
                            <p>Main Key<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if ($n->show)
                                <li class="nav-item">
                                    <a href="{{ route('setting.setup.key.index') }}"
                                        class="nav-link {{ Request::is('setting/setup/mainKey') ? 'active' : '' }}">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>Show Keys</p>
                                    </a>
                                </li>
                            @endif
                            @if ($n->add)
                                <li class="nav-item">
                                    <a href="{{ route('setting.setup.key.create') }}"
                                        class="nav-link {{ Request::is('setting/setup/mainKey/create') ? 'active' : '' }}">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>Add Key</p>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </li>
                @endif
                    @if ($n = check('Services'))
                        <li class="nav-item {{ Request::is('setting/setup/services*') ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link">
                                <i class="fa-brands fa-servicestack"></i>
                                <p>Services<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if ($n->show)
                                    <li class="nav-item">
                                        <a href="{{ route('setting.setup.services.index') }}"
                                            class="nav-link {{ Request::is('setting/setup/services') ? 'active' : '' }}">
                                            <i class="nav-icon far fa-circle"></i>
                                            <p>Show Services</p>
                                        </a>
                                    </li>
                                @endif
                                @if ($n->add)
                                    <li class="nav-item">
                                        <a href="{{ route('setting.setup.services.create') }}"
                                            class="nav-link {{ Request::is('setting/setup/services/create') ? 'active' : '' }}">
                                            <i class="nav-icon far fa-circle"></i>
                                            <p>Create Services</p>
                                        </a>
                                    </li>
                                @endif

                            </ul>
                        </li>
                    @endif

                </ul>
            </li>
        @endif
            @if ($n = check('Site Info'))
                <li class="nav-item">
                    <a href="{{ route('company-details.create') }}"
                        class="nav-link {{ Request::is('company-details/create') ? 'active' : '' }}">
                        <i class="fa-solid fa-circle-info"></i>
                        <p>Site Information</p>
                    </a>
                </li>
            @endif
            @if ($n = check('Features'))
                <li class="nav-item {{ Request::is('setting/features*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link">
                        <i class="fa-solid fa-pause"></i>
                        <p>Features <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if ($n->show)
                            <li class="nav-item">
                                <a href="{{ route('setting.feature.index') }}"
                                    class="nav-link {{ Request::is('setting/features') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Show Features</p>
                                </a>
                            </li>
                        @endif
                        @if ($n->add)
                            <li class="nav-item">
                                <a href="{{ route('setting.feature.create') }}"
                                    class="nav-link {{ Request::is('setting/features/create') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Add Features</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if ($n = check('Role'))
                <li class="nav-item {{ Request::is('setting/role/*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link">
                        <i class="fa-solid fa-dice-d6"></i>
                        <p>Role <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if ($n->show)
                            <li class="nav-item">
                                <a href="{{ route('setting.role.index') }}"
                                    class="nav-link {{ Request::is('setting/role/index') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Show Role</p>
                                </a>
                            </li>
                        @endif
                        @if ($n->add)
                            <li class="nav-item">
                                <a href="{{ route('setting.role.create') }}"
                                    class="nav-link {{ Request::is('setting/role/create') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Add Role</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if ($n = check('User Creation'))
                <li class="nav-item {{ Request::is('setting/user/*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link">
                        <i class="fa-solid fa-user"></i>
                        <p>User Creation <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if ($n->show)
                            <li class="nav-item">
                                <a href="{{ route('setting.user.index') }}"
                                    class="nav-link {{ Request::is('setting/user/index') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Show User</p>
                                </a>
                            </li>
                        @endif
                        @if ($n->add)
                            <li class="nav-item">
                                <a href="{{ route('setting.user.create') }}"
                                    class="nav-link {{ Request::is('setting/user/create') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Create User</p>
                                </a>
                            </li>
                        @endif

                    </ul>
                </li>
            @endif
            @if ($n = check('Site Setting'))
                <li class="nav-item">
                    <a href="{{ route('setting.site.create') }}"
                        class="nav-link {{ Request::is('setting/site-setting*') ? 'active' : '' }}">
                        <i class="fa-solid fa-gears"></i>
                        <p>Site-setting</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif


