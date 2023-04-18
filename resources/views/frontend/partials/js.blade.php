<script>
    //================  Language conversation =========================================
    var bn2en = n => n.replace(/[০-৯]/g, d => "০১২৩৪৫৬৭৮৯".indexOf(d));
    var en2bn = n => n.replace(/\d/g, d => "০১২৩৪৫৬৭৮৯" [d]);
    // End Language conversation


    //  ========================= Toaster object =========================================
    var toastr = {
        count: 0,
        toaster_append(msg, class_name) {
            $('.toastr-div').append(`<div class="toastr ${class_name} mt-2">
                                                <span class="toaster-msg">${msg}</span>
                                            </div>`);
        },
        success(msg) {
            let class_name = 'toastr' + this.count;
            this.toaster_append(msg, class_name);

            $('.' + class_name).fadeIn(1000);
            setTimeout(() => {
                $('.' + class_name).fadeOut(1000);
            }, 2500);
            this.count++;
        },
        error(msg) {
            let class_name = 'toastr' + this.count;
            this.toaster_append(msg, class_name);

            $('.' + class_name).css({
                backgroundColor: 'red'
            });
            $('.' + class_name).fadeIn(1000);
            setTimeout(() => {
                $('.' + class_name).fadeOut(1000);
            }, 2500);
            this.count++;
        }
    }
    // End Toaster object

    //========================== Width wise work ==================================================
    var width = screen.width;
    if (width < 767) {
        $('#cart i').removeClass('shopping-cart');
    }
    if (width > 767) {
        $('#cart_mobile i').removeClass('shopping-cart');
    }
    // End Width object


    //=============================== load  add to card product ====================================
    //Localstorage add to cart system
    @if (serviceCheck('LocalStorage Add To Cart'))
        let count_mobile = document.querySelector('.count-mobile');
        let count = document.querySelectorAll('.count');
        let counts = document.querySelector('.count');
        if (localStorage.getItem('product_storage')) {
            let product_number = Object.keys(JSON.parse(localStorage.getItem('product_storage'))).length;
            count_mobile.innerText = product_number;
            counts.innerText = product_number + ' item(s)';
        }
    @endif


    //Databse basic add to cart system
    @if (serviceCheck('Database Add To Cart'))
    let cart_product_count = 0;

    @php
        $user_ip = $_SERVER['REMOTE_ADDR'];
        $cart_products = App\Models\AddToCart::where('ip_address',$user_ip)->orderBy('id','desc')->get();
        if(Auth::user()){
            $cart_products = App\Models\AddToCart::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        }
    @endphp
    cart_product_count = "{{ count($cart_products) }}";
        $('.cart-product-count').html(cart_product_count);
    @endif

    //=======================================  End    ===============================================




    //=============================== Shopping Cart Product Count(Increment and Decrement) ====================================
    function cartProductCount(type) {
        if (type == 'plus') {
            $('.cart-product-count').html(Number($('.cart-product-count:eq(1)').html()) + 1);
        }

        if (type == 'minus') {
            $('.cart-product-count').html(Number($('.cart-product-count:eq(1)').html()) - 1);
        }

    }

    //=======================================  End    ===============================================




    //======================================= Ajax CRUD Operaation ==================================
    function ajax(p, fallFunc) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let url = null;
        // ajax insert
        if (p.action == 'store') {
             url = "{{ route('ajax.singlestore') }}";
        }
        // ajax show
        if (p.action == 'show') {
             url = "{{ route('ajax.index') }}";
        }
        // ajax edit
        if (p.action == 'edit') {
             url = "{{ route('ajax.edit') }}";
        }
        // ajax delete
        if (p.action == 'delete') {
             url = "{{ route('ajax.delete') }}";
        }

        var data_object = {
            'data_obj': p.data_obj
        };
        if (p.model) {
            data_object.model = p.model;
        }
        if (p.with_arr) {
            data_object.with_arr = p.with_arr;
        }
        if (p.condition) {
            data_object.condition = p.condition;
        }
        $.ajax({
            url: url,
            type: 'post',
            async: false,
            data: data_object,
            success: function(response) {
                fallFunc(response);
            }
        });

    }
    //======================================== End ==================================================


    window.addEventListener('load', function() {
        // =============================== side navbar tigger ====================================
            let open = false;
            $('.side_navbar_toggler').on('click',function(){
                console.log(open);
                if(open){
                    $('#side_navbar').hide(300);
                    open = false;
                }else{
                    $('#side_navbar').show(300);
                    open = true;
                }
            })
        // =============================== End  ====================================




        //=========================================== add to card ==================================
        // let add_to_card_btn = document.querySelectorAll('.add-to-cart');
        // add_to_card_btn.forEach(item => {
        //     item.addEventListener('click', function (event) {
        //         event.preventDefault();
        //         let product_id = this.getAttribute('id');
        //         let title = document.querySelector(`.title${product_id}`).textContent;
        //         let img = document.querySelector(`.img${product_id}`).getAttribute('src');
        //         let price = document.querySelector(`.price${product_id}`).textContent;
        //         let dis_price = document.querySelector(`.dis-price${product_id}`).textContent;

        //         if (localStorage.getItem('product_storage')) {
        //             let product_storage = JSON.parse(localStorage.getItem('product_storage'));
        //             if (product_storage[product_id]) {
        //                 toastr.error('This product already added to your card')
        //             } else {
        //                 product_storage[product_id] = {
        //                     'title': title,
        //                     'img': img,
        //                     'price': price,
        //                     'dis_price': dis_price
        //                 };
        //                 localStorage.setItem('product_storage', JSON.stringify(
        //                     product_storage));
        //                 count.forEach(item => {
        //                     item.innerText = Object.keys(product_storage).length +
        //                         ' item(s)';
        //                 })
        //                 count_mobile.innerText = Object.keys(product_storage).length;
        //                 // toastr.success('This product added to your card')
        //                 if ($(item).parent().parent().find("img").length) {
        //                     addToCartAnimation(item);
        //                 } else {
        //                     toastr.success('This product added to your card')
        //                 }
        //             }
        //         } else {
        //             let product_storage = {};
        //             product_storage[product_id] = {
        //                 'title': title,
        //                 'img': img,
        //                 'price': price,
        //                 'dis_price': dis_price
        //             };
        //             localStorage.setItem('product_storage', JSON.stringify(product_storage));
        //             count.forEach(item => {
        //                 item.innerText = Object.keys(product_storage).length +
        //                     ' item(s)';
        //             });
        //             count_mobile.innerText = Object.keys(product_storage).length;
        //             if ($(item).parent().parent().find("img").length) {
        //                 addToCartAnimation(item);
        //             } else {
        //                 toastr.success('This product added to your card')
        //             }
        //         }
        //     });
        // });
        //=========================================== End ==================================
    });




    // ====================================== add to cart animation ==========================
    function addToCartAnimation(This) {
        // $(This).on('click', function () {
        var cart = $('.shopping-cart');
        var imgtodrag = $(This).parent().parent().parent().find("img");
        if (imgtodrag) {
            var imgclone = imgtodrag.clone()
                .offset({
                    top: imgtodrag.offset().top,
                    left: imgtodrag.offset().left
                })
                .css({
                    'opacity': '0.5',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '100'
                })
                .appendTo($('body'))
                .animate({
                    'top': cart.offset().top + 10,
                    'left': cart.offset().left + 0,
                    'width': 75,
                    'height': 75
                }, 1000);

            setTimeout(function() {
                cart.effect("shake", {
                    times: 2
                }, 200);
            }, 1500);

            imgclone.animate({
                'width': 0,
                'height': 0
            }, function() {
                $(this).detach()
            });
        }
        // });
        //***(use only two class '.add-to-cart', '.shopping-cart' and find image )
    }
    //============================================= End ========================================


    //============================================= DB Add to cart ========================================
        //DBaddToCart function implement rules
        //1. add-to-cart button (or a tage) a nadd-to-cart and it-s data-value hobe 'product id' (compulsary)
        //2.modal add korte hobe(color and size er jonno)
        //3.size input field and named 'size'(optional)(thakle kaj korbe na thakle nai)
        //4.color input field and named 'color'(optional)
        //5.qty input field and named qty(optional)
        //6.AddToCartAnimation er jonno image ta dhorai dite hobe.ai jonno product-div class ta use korte hobe??
        //**Product page er jonno sudu nadd-to-cart class ta bosalei hobe and aitar data-value product id delei hobe. baki option gulo product-details er nonno and size and color er jonno. color and size thakle modal add koro habijabi koro
        @if (serviceCheck('Database Add To Cart'))
            async function DBaddToCart() {
                $('.nadd-to-cart').each(function(index) {
                    $(this).on('click', function(e) {
                        e.preventDefault();
                        let product_id = $(this).attr('data-value');
                        var color_id = $('input[name="p_color_id"]:checked').val();
                        var size_id = $('input[name="p_size_id"]:checked').val();
                        var qty = $('input[name="qty"]').val();
                        var p_total_price = $('input[name="subtotal"]').val();
                        let ip_address = "{{ Request::ip() }}";
                        let user_id = null;
                        @if (Auth::user())
                            user_id = "{{ Auth::user()->id }}";
                        @endif
                        if (!qty) {
                            qty = 1;
                        }
                        var add_to_cart_element = $(this);
                        var img = $('.product-div').eq(index).find('img')

                        if (color_id || size_id) {
                            console.log(p_total_price,'i am p des')
                            aajax({
                                'ip_address': ip_address,
                                'user_id': user_id,
                                'product_id': product_id,
                                'qty': qty,
                                'p_color_id': color_id,
                                'p_size_id': size_id,
                                'price': p_total_price,
                            }, img);
                        } else {
                            ajax({
                                'action': 'show',
                                async: true,
                                'data_obj': {
                                    'id': product_id
                                },
                                'model': 'Product',
                                'with_arr': ['productGallery', 'productGallery.imageGallery',
                                    'productGallery.color', 'productGallery.size',
                                    'productSize',
                                    'productSize.size', 'color', 'color.color'
                                ]
                            }, function(res) {
                                if (res.color.length > 1 || res.product_size.length > 1) {
                                    let color_html = '';
                                    let size_html = '';
                                    $.each(res.color, function(index, value) {
                                        color_html += `<div class="form-check ms-3">
                                                    <input class="form-check-input color modal-color-size" type="radio" name="p_color_id"
                                                        data-id='${value.id}' value="${value.id}"
                                                        id="defaultCheck${index}" data-value="${value.price_increase}">
                                                    <label class="form-check-label" for="defaultCheck${index}">
                                                        ${value.color.c_name}
                                                    </label>
                                                </div>`;
                                    });

                                    $.each(res.product_size, function(index, value) {

                                        size_html += `<div class="form-check ms-3">
                                                        <input class="form-check-input size modal-color-size" type="radio" name="p_size_id"
                                                            data-id='${value.id}' value="${value.id}"
                                                            id="size_check${index}" data-value="${value.price_increase}">
                                                        <label class="form-check-label" for="size_check${index}">
                                                            ${value.size.size}
                                                        </label>
                                                    </div>`;
                                    });

                                    let element_for_modal = `<div class='' mb-3'>
                                                                <span class='d-block'>
                                                                    <span class='h5'>Product Name: </span> <span>${res.title} </span>
                                                                </span>
                                                                <span class='h5'>Price: </span>৳
                                                                <span id='modal_price' data-value="${res.price - res.discount}">${res.price - res.discount} </span>
                                                            </div>
                                                            <hr>
                                                            <div class="d-flex product-color">
                                                                <span class="fw-bold">Colors:</span>
                                                                ${color_html}
                                                            </div>
                                                            <div class="d-flex product-size">
                                                                <span class="fw-bold">Sizes</span><span class="ms-2 fw-bold"> :</span>
                                                            ${size_html}
                                                            </div>
                                                            `;

                                    $('#mainModal .modal-body').html(element_for_modal);
                                    $("#mainModal").modal('show');

                                    //increased price calculation
                                    $('.modal-color-size').on('click',function(){
                                        let increase_price = Number($('input[name="p_color_id"]:checked').attr('data-value')?? 0) ;
                                        let increase_priced = Number($('input[name="p_size_id"]:checked').attr('data-value')?? 0) ;
                                        let p_total_price =Number($('#modal_price').attr('data-value'))+increase_price+increase_priced;
                                        $('#modal_price').html(p_total_price);

                                    })

                                    $('#mainModal .modal-add-to-cart').on('click', function() {
                                        color_id = $('input[name="p_color_id"]:checked')
                                        .val();
                                        size_id = $('input[name="p_size_id"]:checked').val();
                                        p_total_price =  Number($('#modal_price').html());
                                        if (color_id && size_id) {
                                            $(this).prev().click();
                                            aajax({
                                                'ip_address': ip_address,
                                                'user_id': user_id,
                                                'product_id': product_id,
                                                'qty': qty,
                                                'p_color_id': color_id,
                                                'p_size_id': size_id,
                                                'price': p_total_price,
                                            }, img);
                                        } else {
                                            $('#mainModal .modal-body').find(
                                                    '.text-danger')
                                                .remove();
                                            $('#mainModal .modal-body').append(
                                                '<span class="text-danger">Please select Color and Size</span>'
                                            );
                                        }

                                    });
                                    // addToCartAnimation(add_to_cart_element);
                                } else if (res.color.length == 1 || res.product_size.length ==
                                    1) {
                                        p_total_price = res.price
                                    if (res.color.length == 1) {
                                        $.each(res.color, function(index, value) {
                                            color_id = value.id;
                                            p_total_price += value.price_increase;
                                        });
                                    }

                                    if (res.product_size.length == 1) {
                                        $.each(res.color, function(index, value) {
                                            size_id = value.size_id;
                                            p_total_price += value.price_increase;
                                        });
                                    }

                                    console.log(res.price,'product c or s =1')
                                    aajax({
                                        'ip_address': ip_address,
                                        'user_id': user_id,
                                        'product_id': product_id,
                                        'qty': qty,
                                        'p_color_id': color_id,
                                        'p_size_id': size_id,
                                        'price': p_total_price,
                                    }, img);
                                } else {
                                    console.log(res.price);
                                    aajax({
                                        'ip_address': ip_address,
                                        'user_id': user_id,
                                        'product_id': product_id,
                                        'qty': qty,
                                        'price': res.price,
                                    }, img);
                                }



                            });
                        }

                    });
                });

                function aajax(data_obj, img) {
                    console.log(data_obj,'aajax')
                    ajax({
                        'action': 'store',
                        'data_obj': data_obj,
                        'model': 'AddToCart',
                    }, function(res) {
                        cartProductCount('plus');
                        addToCartAnimation(img);
                        $('#mainModal .modal-body').html('');
                    });
                }
            }
        @endif
    //====================================== End ==================================================


    //====================================== -[]+ ==================================================
        //if total count needed
        function totalCount() {
            var total = 0;
            $('.real-price').each(function() {
                total += Number($(this).val());
            })
            $('#total_price').val(total);
        }
        //increment
        $('.plus').each(function(index) {
                $(this).on('click', function() {
                    let qty = Number($(this).prev('input').val()) + 1;
                    if (qty > 9) {
                        toastr.error("You can't add more than 9 quantity")
                        return false;
                    } else {
                        $(this).prev('input').val(qty);
                        $('.real-price').eq(index).val(Number($('.real-price').eq(index).prop('id')) *
                        qty);
                        totalCount();
                    }
                });
            });

             //Decrement
             $('.minus').each(function(index) {
                $(this).on('click', function() {
                    let qty = Number($(this).next('input').val()) - 1;
                    if (qty < 1) {
                        toastr.error("You can't add less than 1 quantity")
                        return false;
                    } else {
                        $(this).next('input').val(qty);
                        $('.real-price').eq(index).val(Number($('.real-price').eq(index).prop('id')) *
                        qty);
                        totalCount();
                    }
                });
            });

              // quantity manually change korle
              $('.cart-qty').each(function(index) {
                $(this).on('change keyup', function() {
                    let qty = Number($(this).val());
                    if (qty > 9) {
                        toastr.error("You can't add more than 9 quantity")
                        return false;
                    } else if (qty < 1) {
                        toastr.error("You can't add less than 1 quantity")
                        return false;
                    } else {
                        $('.real-price').eq(index).val(Number($('.real-price').eq(index).prop('id')) *
                        qty);
                    }
                })
            })
    //====================================== End ==================================================



</script>
