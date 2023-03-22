@extends('frontend.layouts.app')
@push('custom-css')
    <style>
        #checkout_page {
            padding-top: 129px;
            padding-bottom: 15px;
            background: #45ff4578;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        .card {
            font-size: 15px;
        }

        #cart_show input {
            width: 20px;
            text-align: center;
            border: 1px solid #009688;
        }

        #cart_show button {
            width: 21px;
            text-align: center;
            border: 1px solid #009688;
        }

        #cart_show img {
            max-height: 50px;
        }

        .header {
            font-weight: bold;
        }

        .total-div span {
            font-weight: bold;
            font-size: 17px;
        }

        .img {
            max-height: 110px
        }

        .cart-text {
            margin: 0px !important;
            padding: 0px !important;
            font-size: 14px;
        }

        /* Plus minus btn design  */
        .plus-minus-div {
            padding: 0;
            width: 124px;
        }

        .plus-minus-div input {
            height: 25px;
            text-align: center;
        }

        .plus-minus-div button {
            height: 25px;
            width: 30%;
        }

        .plus-minus-div .minus {
            font-size: 25px;
        }

        .cart-color,
        .cart-size {
            padding: 2px 5px;
        }

        .custom-badge {
            top: 12px !important;
            left: 4px !important;
            border-radius: 5px !important;
            height: 23px;
        }

        #total_price,
        .real-price {
            border: none;
            background: transparent;
        }

        #total_price {
            width: 76px !important;
        }

        @media (max-width: 440px) {
            #checkout_page .wrapper-container {
                padding-right: 1px;
                padding-left: 1px;
                margin-left: auto;
                padding: 0px 3px !important;
            }
            .custom-badge {
                left: 6px !important;
            }

        }

    </style>
@endpush
@section('page_conent')
    <div id="checkout_page" >
        <div class="wrapper-container">
            <form action="{{ route('order.store') }}" method="POST">
                @csrf

                @if (serviceCheck('Database Add To Cart'))
                    <div class="card text-center">
                        <div class="card-header">
                            <h4> Your Cart</h4>
                        </div>
                        <div class="card-body" id="cart_product">
                            <form action="">
                                @php
                                    $total = 0;

                                @endphp
                                @forelse ($cart_products as $cart_product)
                                    @php
                                        $total += $cart_product->product->price;
                                    @endphp

                                    <input type="hidden" name="order_item[{{ $cart_product->id }}][product_id]"
                                        value="{{ $cart_product->product_id }}">
                                        <div class="row">
                                            <div class="col-md-8 m-auto">
                                            <div class="card">
                                                <div class="card-body position-relative">
                                                    <span
                                                        class="position-absolute top-0 start-100 translate-middle custom-badge badge rounded-pill bg-danger remove"
                                                        id="{{ $cart_product->id }}">
                                                        <button type="button" class="btn-close"
                                                            aria-label="Close"></button>
                                                    </span>


                                                    <div class="d-flex justify-content-around text-start">
                                                        <div>
                                                            <a href="{{ route('product_details', [$cart_product->product->id]) }}">
                                                                <img src="{{ asset($cart_product->product->photo) }}"
                                                                    alt="" class="img">
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <span class="d-block">{{ $cart_product->product->title }}</span>
                                                            @if ($cart_product->color)
                                                                <span class="d-block"><span>Color:</span>
                                                                <span>{{ $cart_product->color->color->c_name }}</span>
                                                                <input type="hidden"
                                                                    name="order_item[{{ $cart_product->id }}][p_color_id]"
                                                                    value="{{ $cart_product->p_color_id }}"></span>

                                                            @endif
                                                            @if ($cart_product->size)
                                                               <span class="d-block">
                                                                <span>Size:
                                                                </span><span>{{ $cart_product->size->size->size }}</span>
                                                                <input type="hidden"
                                                                    name="order_item[{{ $cart_product->id }}][p_size_id]"
                                                                    value="{{ $cart_product->p_size_id }}">
                                                               </span>
                                                            @endif
                                                        </div>
                                                        @php
                                                            $price = ($cart_product->product->price - $cart_product->product->discount + $cart_product->priceIncrease()) * $cart_product->qty;
                                                        @endphp
                                                        <div class="cart-text">
                                                            <span class="d-block">BD ৳ <input class="real-price w4digit"
                                                                    id="{{ $cart_product->price }}"
                                                                    value="{{ $cart_product->price }}"
                                                                    name="order_item[{{ $cart_product->id }}][price]"></span>

                                                            <div class="input-group mb-3 plus-minus-div pt-2">
                                                                <button type="button"
                                                                    class="input-group-text minus">-</button>
                                                                <input type="text"
                                                                    name="order_item[{{ $cart_product->id }}][qty]"
                                                                    class="form-control cart-qty" value="{{$cart_product->qty}}">
                                                                <button type="button"
                                                                    class="input-group-text plus">+</button>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                @empty
                                    <p>There are no products to your carts</p>
                                @endforelse

                        </div>
                        <div class="card-footer text-muted text-center">
                            <h4 class="text-center">Total: BD ৳<input name="subtotal" class="" id="total_price"
                                    readonly value="{{ $total }}"></h4>
                        </div>
                    </div>
                @endif

                @if (serviceCheck('LocalStorage Add To Cart'))
                    {{-- cart product show  --}}
                    <div class="card text-center mt-4">
                        <div class="card-header">
                            <h2 class="">Your all selected products</h2>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cart_show">
                                        <tr>
                                            <td colspan="4">There are no products</td>
                                        </tr>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th>Total =</th>
                                            <th>৳<span class="all-total"></span></th>
                                        </tr>
                                    </tfoot>

                                </table>
                            </div>
                        </div>

                    </div>
                @endif

                {{-- checkout form  --}}
                <div class="card mt-4" id="checkout_form">
                    <div class="card-header">
                        <h3 class="text-center"> Fill up the form </h3>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="name" class="form-label">Full Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    value="{{ Auth::id() ? Auth::user()->name : '' }}" name="name" id="name"
                                    placeholder="Enter your full name" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="phone" class="form-label">Phone No.<span class="text-danger">*</span></label>
                                <input type="tel" class="form-control"
                                    value="{{ Auth::id() ? Auth::user()->phone : '' }}" name="phone" id="phone"
                                    placeholder="Enter your phone number" required>
                            </div>
                            @if (isset($shippings))
                                <div class="col-md-4 mb-3">
                                    <label for="shipping_id" class="form-label">Delivery Charge<span
                                            class="text-danger">*</span></label>
                                    <select name="shipping_id" class="form-select" id="shipping_id" required>
                                        <option value="">Select shipping area</option>
                                        @foreach ($shippings as $shipping)
                                            <option value="{{ $shipping->id ?? old('shipping') }}">
                                                {{ $shipping->type . '(' . $shipping->price . '৳)' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <div class="col-md-6 mb-3">
                                <label for="address" class="form-label">Address<span class="text-danger">*</span></label>
                                <textarea name="address" class="form-control" id="address" cols="30" rows="3"
                                    placeholder="Enter your full address" required>{{ Auth::id() ? Auth::user()->address : '' }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="note" class="form-label">Note</label>
                                <textarea name="note" class="form-control" id="note" cols="30" rows="3"
                                    placeholder="Enter note your opinion"></textarea>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="name" class="form-label">Payment system<span
                                        class="text-danger">*</span></label>
                                <select name="payment_id" id="" class="form-select">
                                    @foreach ($payments as $payment)
                                        <option value="{{ $payment->id }}">{{ $payment->payment }}</option>
                                    @endforeach

                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row ">
                            <div class="col-md-11 m-auto">

                                <button class="btn btn-primary w-100 text-white">Confirm Order</button>

                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>
@endsection

@push('custom-js')
    @if (serviceCheck('Database Add To Cart'))
        <script>
            function productHaveOrNot() {
                if ($('.remove').length < 1) {
                    $('#cart_product').html('You have removed All Product');
                    $('#checkout_form').hide();
                    $('#total_price').parent().hide();
                }
            }
            productHaveOrNot();

            //product remove from cart
            $('.remove').each(function(index) {
                $(this).on('click', function() {
                    let id = $(this).prop('id');
                    var add_to_cart_element = $(this);
                    ajax({
                        'action': 'delete',
                        'data_obj': {
                            'id': id
                        },
                        'model': 'AddToCart',
                    }, function(res) {
                        if (res) {
                            toastr.success("Remove Successfully")
                        }
                        add_to_cart_element.parent().parent().remove();
                        cartProductCount('minus');
                        totalCount();
                        productHaveOrNot();
                    });
                })
            })
        </script>
    @endif
    @if (serviceCheck('LocalStorage Add To Cart'))
        <script>
            var d = document;
            let card_body = document.getElementById("cart_show");
            let cart_product = JSON.parse(localStorage.getItem('product_storage'));
            let appends = ``;

            for (let item in cart_product) {
                appends += ` <tr>
                                <td><img src="${cart_product[item].img}" alt=""></td>
                                <td>৳<span class='price'>${cart_product[item].dis_price}</span></td>
                                <td>
                                    <div class="input-group justify-content-center">
                                        <button class="btn btn-sm text-white minus-btn" type="button">-</button>
                                        <input type="text" name='product[${item}][qty]' value="১" class='qty'>
                                        <button class="btn btn-sm text-white plus-btn" type="button">+</button>
                                    </div>
                                </td>
                                <td>৳<span
                                        class="total-price">${cart_product[item].dis_price}</span>
                                </td>
                                <td><span class='text-danger remove-product' role='button' id="${item}"><i
                                            class="fa-solid fa-trash"></i></span></td>
                            </tr>`;


            }

            card_body.innerHTML = appends;
            let total_count = document.querySelectorAll('.total-count');
            let total_element = document.getElementById('toal');

            totalPriceCount();

            //qty increment
            $('.plus-btn').on('click', function() {
                let index = $(this).index('.plus-btn');
                let qty = Number(bn2en($('.qty').eq(index).val())) + 1;
                if (qty > 5) {
                    toastr.error("You can't select more than 5 product");
                } else {
                    let price = Number(bn2en($('.price').eq(index).text()));
                    let total_price = qty * price;
                    $('.qty').eq(index).val(String(qty));
                    $('.total-price').eq(index).text(String(total_price));
                    totalPriceCount();
                }
            })

            //qty decrement
            $('.minus-btn').on('click', function() {
                let index = $(this).index('.minus-btn');
                let qty = Number(bn2en($('.qty').eq(index).val())) - 1;
                if (qty < 1) {
                    toastr.error("You have to select at least one product");
                } else {
                    let price = Number(bn2en($('.price').eq(index).text()));
                    let total_price = qty * price;
                    $('.qty').eq(index).val(String(qty));
                    $('.total-price').eq(index).text(String(total_price));
                    totalPriceCount();
                }
            })

            // function increment(element) {
            //     element.forEach(item => {
            //         item.addEventListener('click', function(event) {
            //             if (Number(this.nextElementSibling.value) > 4) {
            //                 alert("You can't select more than 5 product")
            //             } else {
            //                 let id = this.getAttribute('id');
            //                 let price = Number(d.querySelector(`.price${id}`).textContent);
            //                 let total_priceE = d.querySelector(`.total-price${id}`);
            //                 let qty = Number(this.nextElementSibling.value) + 1;
            //                 this.nextElementSibling.value = qty;
            //                 let total_price = price * qty;
            //                 total_priceE.textContent = total_price;
            //                 totalPriceCount();
            //             }
            //         });
            //     });
            // }


            // function decrement(element) {
            //     element.forEach(item => {
            //         item.addEventListener('click', function(event) {
            //             if (Number(this.previousElementSibling.value) < 2) {
            //                 alert("You have to select at least one product")
            //             } else {
            //                 let id = this.getAttribute('id');
            //                 let price = Number(d.querySelector(`.price${id}`).textContent);
            //                 let total_priceE = d.querySelector(`.total-price${id}`);
            //                 let qty = Number(this.previousElementSibling.value) - 1;
            //                 this.previousElementSibling.value = qty;
            //                 let total_price = price * qty;
            //                 total_priceE.textContent = total_price;
            //                 totalPriceCount();
            //             }
            //         });
            //     })
            // }

            function totalPriceCount() {
                let total = 0;
                $('.total-price').each(function() {
                    total += Number(bn2en($(this).text()));
                })
                $('.all-total').text(String(total));
            }

            //remove product from cart
            let remove = d.querySelectorAll('.remove-product');
            let cart_store = JSON.parse(localStorage.getItem('product_storage'));
            remove.forEach((item, index) => {
                item.addEventListener('click', function() {
                    let id = item.getAttribute('id');
                    if (cart_store[id]) {

                        // substitution from total

                        let dis_price = Number(bn2en($(item).parent().prev().find('.total-price').html()));
                        let all_total = Number(bn2en($('.all-total').html())) - dis_price;
                        $('.all-total').html(String(all_total));

                        item.parentElement.parentElement.remove();
                        delete cart_store[id];
                        localStorage.setItem('product_storage', JSON.stringify(cart_store));
                        count_mobile.innerText = Object.keys(cart_store).length;
                        counts.innerText = Object.keys(cart_store).length + ' item(s)';

                    }

                });
            });
        </script>
    @endif

@endpush
