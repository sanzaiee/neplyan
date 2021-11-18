@extends('frontend.master')
@section('content')

@section('khalti')
<script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>

@endsection
    <section class="banner-section">
        <div class="container">
        <div class="title-group">
            <h1 class="main-title">
                Mode Of Payment
            </h1>
        </div>
        <div class="breadcrumbs">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Payment Mode</li>
                </ol>
            </nav>
        </div>
        </div>
    </section>

 <section class="payment-section">
    <div class="container">
       <div class="row">
          <div class="col-md-8">
             <div class="payment-head">
                <h2>Payment Selection</h2>
                <div class="line"></div>
             </div>

             <div class="payment-box">
                <div class="row">
                   <div class="col-md-9">
                      <div class="media">
                         <div class="media-body">
                            <h5 class="mt-0 mb-1">Esewa</h5>
                            <p>You will be redirected to e-sewa website to complete your purchase securely.</p>
                         </div>
                      </div>
                   </div>
                   <div class="col-md-3">

                    <a href="" class="esewaPay m-r-5" data-toggle="tooltip"
                        data-original-title="PayByEsewa">
                        {{--  onclick="event.preventDefault(); if(confirm('Are You Sure ?')) document.getElementById('pay-form-esewa').submit();">  --}}
                        <div class="esewa-img">
                            <img src="{{ asset('frontend/image/esewa.png') }}">
                            <p>Pay With Esewa</p>
                        </div>
                    </a>
                {{--  if(confirm('Are You Sure ?')) document.getElementById('pay-form-esewa').submit();  --}}


                {{--  <a href="" class="btn btn-rounded btn-xs btn-danger m-r-5" data-toggle="tooltip"
                data-original-title="Delete"
                onclick="event.preventDefault(); if(confirm('Are You Sure ?')) document.getElementById('delete-form-{{ $item->id }}').submit();">
             <i class="fa fa-trash"></i>
             </a>
             <form id="delete-form-{{ $item->id }}" action="{{route('product.destroy',$item->id)}}" method="post">
                @csrf
                @method('delete')
             </form>  --}}


                    <form id="pay-form-esewa" action="https://uat.esewa.com.np/epay/main" method="post">
                        @csrf
                        <input id="tAmt" name="tAmt" type="hidden">
                        <input id="amt" name="amt" type="hidden">
                        <input value="0" name="txAmt" type="hidden">
                        <input value="0" name="psc" type="hidden">
                        <input value="0" name="pdc" type="hidden">
                        <input value="{{ $pid }}" name="pid" type="hidden">
                        <input value="EPAYTEST" name="scd" type="hidden">
                        <input value="ee2c3ca1-696b-4cc5-a6be-2c40d929d453" name="pid" type="hidden">
                        <input value="{{ route('esewa.success') }}" type="hidden" name="su">
                        <input value="{{ route('esewa.fail') }}" type="hidden" name="fu">
                    </form>
                   </div>
                </div>

             </div>
             <div class="payment-box">
                <div class="row">
                   <div class="col-md-9">
                      <div class="media">
                         <div class="media-body">
                            <h5 class="mt-0 mb-1">Khalti</h5>
                            <p>You will be redirected to e-sewa website to complete your purchase securely.</p>
                         </div>
                      </div>
                   </div>
                   <div class="col-md-3">
                      <div class="esewa-img">
                         <img src="{{ asset('frontend/image/khalti.png') }}">
                         <button id="payment-button">Pay with Khalti</button>
                      </div>
                   </div>
                </div>
             </div>
             {{--  <div class="complete-order">
                <button><a href="#">Complete Order</a></button>
             </div>  --}}
          </div>
          <div class="col-md-4">
             <div class="buy-book">
                <div class="buy-head">
                   <h2>Book Information</h2>
                </div>
                <div class="line"></div>
                <div class="list-book-cart">
                   <div class="cart-book">
                      <div class="media">
                         <img class="mr-3" src="{{ $product->image }}" alt="">
                         <div class="media-body">
                            <h5 class="mt-0">{{ $product->name }}</h5>
                            <p>Rs. {{ $product->price }}</p>
                         </div>
                      </div>

                        <div class="line"></div>
                        <input type="hidden" name="discount_status" id="discount_status">
                        <div class="discount" style="display: none;">
                            <div class="total-rate mt-4">
                                @php
                                    $discount = App\Discount::where('status',1)->first();
                                    $percent = $discount->percent / 100;
                                    
                                    $price = $product->price - $percent * $product->price;
                                @endphp
                                
                               
                                Total Price : Rs.{{ $price }} <span class="text-success">(Price after discount {{$discount->percent}}% off)</span>
                            </div>
                        </div>

                        <div class="nodiscount">
                            <div class="total-rate mt-4">
                                {{-- @php
                                    $price = $product->price - 0.15 * $product->price;
                                @endphp --}}
                                Total Price : Rs.{{ $product->price }}
                            </div>
                        </div>
                   </div>
                </div>

                <div class="line"></div>
                <div class="price-total mt-2">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="total-title">
                                <!--<img src="{{ asset('frontend/image/discount.gif') }}" alt="">-->
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="total-rate mt-4">
                                <label for="seller"><span class="text-danger">Please.!! Validate Seller Mobile Number</span></label>
                                <input class="form-control color" id="seller"  type="text" name="seller" placeholder="Enter Seller Mobile Number">
                                <i style="display: none;" class="fa fa-check" id="check" aria-hidden="true"></i>
                                <i style="display: none;" class="fa fa-times" id="cross" aria-hidden="true"></i>
                                <p style="display: none;" class="yes-discount text-success">Congratulation!! You will get 15% off</p>
                                <p style="display: none;" class="no-discount text-danger">Sorry!! No Discount Available..</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="line"></div>

             </div>
          </div>
       </div>
    </div>
 </section>
@endsection

@section('esewaj')
    <script>
        $('.esewaPay').on('click',function(e){
            e.preventDefault();
            let data={
                id: {{ $product->id }},
                pid: '{{ $pid }}',
                pslug: '{{ $product->slug }}',
                mode:1,
                seller : $('#seller').val(),
                discount_status : $('#discount_status').val()
            };
            // return false;
            axios.post('{{ route('order.store') }}',data).then(res=>{
                console.log(res.data);
            });

            if(data.seller === '')
            {
                $('#tAmt').val({{ $product->price }});
                $('#amt').val({{ $product->price }});
            }
            console.log($('#tAmt').val());

            if(confirm('Are You Sure ?')) document.getElementById('pay-form-esewa').submit();
        });
    </script>

    <script>
        $('#seller').on('keyup',function(e){
            e.preventDefault();
            let data = {
                seller : $('#seller').val()
            };
                      // return false;
            axios.post('{{ route('check.seller') }}',data).then(res=>{
                // console.log(res.data);
                if(res.data == "success"){
                    $("#check").show()
                    $("#cross").hide()
                    $("#seller").css("border-color", "green");
                    $(".yes-discount").show()
                    $(".discount").show()
                    $(".no-discount").hide()
                    $(".nodiscount").hide()
                    $('#tAmt').val({{ $price }});
                    $('#amt').val({{ $price }});
                    $('#discount_status').val(1);
                }
                else
                {
                    $("#check").hide()
                    $("#cross").show()
                    $("#seller").css("border-color", "red");
                    $(".no-discount").show()
                    $(".discount").show()
                    $(".yes-discount").hide()
                    $(".discount").hide()
                    $(".nodiscount").show()

                    $('#tAmt').val({{ $product->price }});
                    $('#amt').val({{ $product->price }});
                    $('#discount_status').val(0);
                }
            });
        });
    </script>

@endsection


@section('khaltiscript')
<script>
    var config = {
        // replace the publicKey with yours
        "publicKey": "test_public_key_dc74e0fd57cb46cd93832aee0a390234",
        "productIdentity": "1234567890",
        "productName": "Dragon",
        "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
        "paymentPreference": [
            "KHALTI",
            "EBANKING",
            "MOBILE_BANKING",
            "CONNECT_IPS",
            "SCT",
            ],
        "eventHandler": {
            onSuccess (payload) {
                // hit merchant api for initiating verfication
                console.log(payload);
            },
            onError (error) {
                console.log(error);
            },
            onClose () {
                console.log('widget is closing');
            }
        }
    };

    var checkout = new KhaltiCheckout(config);
    var btn = document.getElementById("payment-button");
    btn.onclick = function () {
        // minimum transaction amount must be 10, i.e 1000 in paisa.
        checkout.show({amount: 1000});
    }

</script>
@endsection
