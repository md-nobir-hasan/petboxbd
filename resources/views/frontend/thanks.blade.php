@php
    $pp = 0;
    $pdp= 0;
    $total = 0;
    $all_discount = 0;
    foreach($orders->orderItem as $it){
        $total += $it->qty*$it->product->price;
        $all_discount += $it->qty*$it->product->discount;
    }
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petbox</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alkalami&family=Comme:wght@200;600;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alkalami&family=Comme:wght@200;600;800&family=Lato:ital,wght@1,300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/frontend/css/thanks.css')}}">
<style>
    .main-head{
        padding-right: 10px;
        text-align: right;
    }
</style>
</head>
<body>
    <div class="main-head">
        <div class="head"></div>
<!-- ------------------------header-section--------------- -->
    <div class="main-petbox">
        <div class="petbox">
            <div class="box1">
                <div class="box-child1">
                  <div class="child1"><img src="{{asset($site_info->logo)}}" alt="{{$site_info->title}}">
                </div>
                  <div class="child2">
                    <div class="h1 fff1">{{$site_info->title}}</div>
                    <div class="h2 fff1 tm-0">Panthapath,Dhaka-1205,<span class="su1">Bangladesh</span> </div></br>
                    <div class="h3 fff1 tm-0">{{$site_contact_info->email}}</div></br>
                    <div class="h4 fff1 tm-0">(+88){{$site_contact_info->phone}}</div>
                  </div>
                </div>
                <div class="box-child2">
                    <div class="h5 fff1">Your Pet's Best Friend</div>
                    <div class="h6 fff1">Online Shop</div>
                </div>
            </div>
            <!-- ---------------header-section-end-------------- -->

            <!-- --------------------invoice-section-start------------ -->
        <div class="invoice-title">
            <div class="invoice">
                <div class="invoice1">
                    <div class="s fff1">Invoice</div>
                    @php
                        $dat = date_format($orders->created_at,'d-m-Y');
                        $date = \Carbon\Carbon::createFromFormat('d-m-Y', $dat);
                    @endphp
                    <div class="u fff1">{{$date->format('d F Y')}}</div>
                </div>
                <div class="invoice2">
                    <div class="m fff1">Invoice No #</div>
                    <div class="o u fff1">#{{$orders->order_number}}</div>
                </div>
            </div>
            <div class="payment">
                <div class="pay fff1">Invoice for</div>
                <div class="pay fff1">Payment Type</div>
            </div>
            <div class="payment0">
                <div class="payment1 payment6">
                    <div class="pay1">Name: </div>
                    <div class="pay2 pay1 pay-0 ml39">{{$orders->user->name}}</div>
                </div>
                <div class="payment2">
                    <div class="pay1">
                        {{-- COD --}}
                        {{$orders->payment->payment}}
                    </div>
                </div>
            </div>
            <div class="payment0">
                <div class="payment1 payment5">
                    <div class="pay1">Mobile: </div>
                    <div class="pay2 pay1 pay-0 ml31">(+88){{$orders->phone}}</div>

                </div>
                <div class="payment2">
                    <div class="pay"> Total Amount</div>
                </div>
            </div>
            <div class="payment0">
                <div class="payment1 payment4">
                    <div class="pay1">Address: </div>
                    <div class="pay2 pay1 ml22">
                        <span>{{$orders->address}}</span>
                        {{-- 60,West Rajabazar,
                        <span class="su1">Sher-E-Bangla Nagar,</span>
                        <span class="su-01">
                            <span class="su1">Tejgaon,Dhaka-1215,Bangladesh</span>
                        </span> --}}

                    </div>
                </div>
                <div class="payment2">
                    <div class="n pay fff1"> <span>৳</span>{{$all_total = $total - $all_discount + ($sp = $orders->shipping->price)}}</div>
                </div>
            </div>
            <div class="table-title">
                <div class="table-head">
                    <div class="head1">
                        <div class="head2 h fff1">Description</div>
                    </div>
                    <div class="head0">
                        <div class="h ff0 fff1 ">Qty</div>
                        <div class="h ff1 fff1">Unit price</div>
                        <div class="h fff1">Total price</div>
                    </div>
                </div>
                @foreach ($orders->orderItem as $item)
                    <div class="table-head m-0">
                        <div class="head1">
                            <div class="head3 pay1">Item #{{$loop->index+1}}</div>
                        </div>
                        <div class="head0">
                            <div class="tm  fg0">{{$item->qty}}</div>
                            <div class="tm  fg0"><span>৳</span>{{$spp = $item->product->price}}</div>
                            <div class="tm "><span>৳</span>{{$item->qty*$spp}}</div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="table-head">
                    <div class="head1">
                        <div class="head4 pay1">Item #2</div>
                    </div>
                    <div class="head0">
                        <div class="tm fg0 ">5</div>
                        <div class="tm fg0"><span>৳</span>2.00</div>
                        <div class="tm"><span>৳</span>10.00</div>
                    </div>
                </div> --}}
                <div class="m-0 m0"></div>
            </div>
            <div class="bill">
                <div class="notes fff1">
                    <div>Notes:
                        <p class="note">{{$orders->note}}</p>
                    </div>
                </div>
                <div class="subtotal">
                    <div class="charge fff1">
                        <div class="mm1 m1">Subtotal</div>
                        <div class="mm1 m1">Shiping charge</div>
                        <div class="mm1 m1"> Discount</div>
                    </div>
                    <div class="rate fff1">
                        <div class="mm1"><span>৳</span>{{$total}}</div>
                        <div class="mm1"><span>৳</span>{{$sp}}</div>
                        <div class="mm1"><span>৳</span>{{$all_discount}}</div>
                        <div class="mm1 m01 fff1"><span>৳</span>{{$all_total}}</div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="footer1">
                    <div class="btn0 ff-01">Thanking You Message</div>
                    <div class="btn ff-01"> Thank you for purchasing from "PET BOX".
                        we</br> are really glod for choosing us & happy for </br>
                        getting you .Keep in touch with"PET BOX". </br>Thank you.
                    </div>
                </div>
                <div class="footer2">
                   <div class="btn0 ff-01">Important Notes</div>
                    <div class="btn ff-01">Check & match your percel with your order </br>
                        in front of our Delivery Hero after receiving.</br>
                         if you miss it, we won't accept any</br>
                        complain or isuue. thank you.
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>



