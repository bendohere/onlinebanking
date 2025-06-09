
@extends('layouts.dash2')
@section('title', $title)
@section('content')
    <!-- Page title -->
    <div class="content-w">
        <div><x-danger-alert />
            <x-success-alert />
<!-- Page title -->
<div class="main-panel ">
    <div class="content ">
        <div class="page-inner col-lg-10 ">
          
            <x-danger-alert/>
            <x-success-alert/>
            <x-error-alert/>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="mt-2 mb-4">
                        <h1 class="title1 ">Make Deposit</h1>
                    </div>
                    <div class="card  shadow-lg p-2 p-md-4">
                        <div class="card-body">
                            @if($title !="Complete Payment")
                                @php
                                    if($payment_mode->name == "Bitcoin"){
                                        $coin = 'BTC';
                                    }elseif ($payment_mode->name == "Litecoin") {
                                        $coin = 'LTC';
                                    }else {
                                        $coin = 'ETH';
                                    }
                                @endphp
                                <div>
                                    <h4 class="">You are to make payment of <strong>{{$settings->currency}}{{number_format($amount)}}</strong> using your selected payment method. Screenshot and upload the proof of payment</h4>
                                    <h4>
                                        @if ((!empty($payment_mode->barcode) or $payment_mode->barcode != NULL) and $payment_mode->methodtype != 'currency')
                                            <div class="text-center">
                                                <img src="{{ asset('storage/app/public/photos/'.$payment_mode->barcode)}}" alt="" class="w-50">
                                            </div>
                                            @endif
                                        <strong class="">{{$payment_mode->name}}</strong>
                                    </h4>
                                </div>
                            
                                <div class="mt-5">
                                    @if($settings->deposit_option != "manual")
                                        @if ($payment_mode->name == "Bitcoin" or $payment_mode->name == "Litecoin" or $payment_mode->name == "Ethereum")
                                        <a href="{{ url('dashboard/cpay') }}/{{$amount}}/{{$coin}}/{{ Auth::user()->id }}/new" class="btn btn-{{$text}}">Pay Via Coinpayment</a>
                                        @else
                                            @if ((!empty($payment_mode->barcode) or $payment_mode->barcode != NULL) and $payment_mode->methodtype != 'currency')
                                            <div class="text-center">
                                                <img src="{{ asset('storage/app/public/photos/'.$payment_mode->barcode)}}" alt="" class="w-50">
                                            </div>
                                            @endif
                                        @endif
                                    @endif
                                    @if ($payment_mode->methodtype != 'currency')
                                        <h3 class="">
                                            <strong>{{$payment_mode->name}} Address:</strong>
                                        </h3>
                                        <div class="form-group">
                                            <div class="fv-row mb-6">
                                                
                                                <input class="form-control form-control-lg form-control-solid " readonly   type="text" id="myInput" value="{{$payment_mode->wallet_address}}" multiple />
                                                                                   
                                            
                                               
                                                    <button class="btn btn-outline-secondary" onclick="myFunction()" type="button" id="button-addon2"><i class="fas fa-copy"></i></button>
                                                
                                                
                                            </div>
                                                <small class=""><strong>Network Type:</strong> {{$payment_mode->network}}</small>
                                        </div>

                                        @else
                                        <h3 class="">
                                            <strong>{{$payment_mode->name}}:</strong>
                                        </h3>
                                            @if ($payment_mode->defaultpay == 'yes')
                                                @if ($payment_mode->name == "Paystack")
                                                    <?php $payamount = $amount * 100  ?>
                                                    <div id="paystack">
                                                        <form method="POST" action="{{ route('pay.paystack') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                                                            <input type="hidden" name="email" value="{{auth::user()->email}}">
                                                            <input type="hidden" name="amount" value="{{$payamount}}">
                                                            <input type="hidden" name="currency" value="{{$settings->s_currency}}">
                                                            <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > 
                                                            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> 
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                                            <p>
                                                            <button class="py-2 btn btn-primary" type="submit" value="Pay Now!">
                                                            <i class="fa fa-credit-card fa-lg"></i> Pay with Paystack
                                                            </button>
                                                            </p>
                                                        </form>
                                                    </div>
                                                @endif
                                                @if ($payment_mode->name == "Stripe")
                                                    <form id="payment-form" class="sr-payment-form">
                                                        @csrf
                                                        <div class="sr-combo-inputs-row">
                                                            <div class="sr-input sr-card-element" id="card-element"></div>
                                                        </div>
                                                        {{-- <div class="sr-field-error" id="card-errors" role="alert"></div> --}}

                                                        <button id="stripesubmit">
                                                            <div class="spinner d-none" id="spinner"></div>
                                                            <span id="buttontext" class="">Pay</span>
                                                        </button>
                                                    </form>
                                            
                                                    <div class="hidden row" id="stripesuccess">
                                                        <div class="col-lg-12">
                                                            <span>Payment Completed, redirecting.....</span>
                                                        </div>
                                                    </div>
                                                    
                                                    <form id="selectform" method="POST" action="javascript:void(0)">
                                                        @csrf
                                                        <input type="hidden" name="amount" value="{{$amount}}">
                                                    </form>
                                                @endif
                                                @if ($payment_mode->name == "Paypal")
                                                    <div>
                                                        @include('includes.paypal')
                                                    </div>
                                                @endif
                                                @if ($payment_mode->name == "Bank Transfer")
                                                @if (!empty($payment_mode->bankname))
                                                <div class="d-block">
                                                    <h5 class="">Bank Name</h5>
                                                </div>
                                                <div class="mb-3 input-group">
                                                    <input type="text" class="form-control myInput readonly  " value="{{$payment_mode->bankname}}" readonly>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary" onclick="myFunction()" type="button" id="button-addon2" disabled><i class="fas fa-copy"></i></button>
                                                    </div>
                                                </div>
                                                @endif
                                                @if (!empty($payment_mode->account_name))
                                                <div class="d-block">
                                                    <h5 class="">Account Name</h5>
                                                </div>
                                                <div class="mb-3 input-group">
                                                    <input type="text" class="form-control myInput readonly  " value="{{$payment_mode->account_name}}" readonly>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary" onclick="myFunction()" type="button" id="button-addon2" disabled><i class="fas fa-copy"></i></button>
                                                    </div>
                                                </div>
                                                @endif
                                                @if (!empty($payment_mode->account_number))
                                                <div class="d-block">
                                                    <h5 class="">Account Number</h5>
                                                </div>
                                                <div class="mb-3 input-group">
                                                    <input type="text" class="form-control myInput readonly  " value="{{$payment_mode->account_number}}" readonly>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary" onclick="myFunction()" type="button" id="button-addon2" disabled><i class="fas fa-copy"></i></button>
                                                    </div>
                                                </div>
                                                @endif
                                                @if (!empty($payment_mode->swift_code))
                                                <div class="d-block">
                                                    <h5 class="">Swift Code</h5>
                                                </div>
                                                <div class="mb-3 input-group">
                                                    <input type="text" class="form-control myInput readonly  " value="{{$payment_mode->swift_code}}" readonly>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary" onclick="myFunction()" type="button" id="button-addon2" disabled><i class="fas fa-copy"></i></button>
                                                    </div>
                                                </div>
                                                @endif
                                                @endif
                                            @else
                                                @if (!empty($payment_mode->bankname))
                                                <div class="d-block">
                                                    <h5 class="">Bank Name</h5>
                                                </div>
                                                <div class="mb-3 input-group">
                                                    <input type="text" class="form-control myInput readonly  " value="{{$payment_mode->bankname}}" readonly>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary" onclick="myFunction()" type="button" id="button-addon2" disabled><i class="fas fa-copy"></i></button>
                                                    </div>
                                                </div>
                                                @endif
                                                @if (!empty($payment_mode->account_name))
                                                <div class="d-block">
                                                    <h5 class="">Account Name</h5>
                                                </div>
                                                <div class="mb-3 input-group">
                                                    <input type="text" class="form-control myInput readonly  " value="{{$payment_mode->account_name}}" readonly>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary" onclick="myFunction()" type="button" id="button-addon2"disabled><i class="fas fa-copy"></i></button>
                                                    </div>
                                                </div>
                                                @endif
                                                @if (!empty($payment_mode->account_number))
                                                <div class="d-block">
                                                    <h5 class="">Account Number</h5>
                                                </div>
                                                <div class="mb-3 input-group">
                                                    <input type="text" class="form-control myInput readonly  " value="{{$payment_mode->account_number}}" readonly>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary" onclick="myFunction()" type="button" id="button-addon2"disabled><i class="fas fa-copy"></i></button>
                                                    </div>
                                                </div>
                                                @endif
                                                @if (!empty($payment_mode->swift_code))
                                                <div class="d-block">
                                                    <h5 class="">Swift Code</h5>
                                                </div>
                                                <div class="mb-3 input-group">
                                                    <input type="text" class="form-control myInput readonly  " value="{{$payment_mode->swift_code}}" readonly>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary" onclick="myFunction()" type="button" id="button-addon2"disabled><i class="fas fa-copy"></i></button>
                                                    </div>
                                                </div>
                                                @endif
                                            @endif
                                    @endif
                                </div>
                                @if ($settings->deposit_option == "auto" and $payment_mode->defaultpay != 'yes')
                                    <div>
                                        <form method="post" action="{{route('savedeposit')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="fv-row mb-6">
                                                <label class="form-label fs-6 fw-bolder text-dark">Upload Payment proof after payment.</label>
                                                <input class="form-control form-control-lg form-control-solid" name="proof" type="file"  multiple />
                                                                                    </div>
                                            
                                            <input type="hidden" name="amount" value="{{$amount}}">
                                            <input type="hidden" name="paymethd_method" value="{{$payment_mode->name}}">

                                            <div class="text-center mt-10">
                                                <button type="submit" class="btn btn-lg btn-primary btn-block fw-bolder me-3 my-2">
                                                    <span >Submit Payment</span>
                                                    <!-- <span wire:loading wire:target="addTicket">Processing Request...</span> -->
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                                @if($settings->deposit_option == "manual" and $payment_mode->name != "Paystack" and $payment_mode->name != "Stripe" and $payment_mode->name != "Paypal" and $title !="Complete Payment")
                                    <div>
                                        <form method="post" action="{{route('savedeposit')}}" enctype="multipart/form-data">
                                            @csrf
                                        

                                            <div class="fv-row mb-6">
                                        <label class="form-label fs-6 fw-bolder text-dark">Upload Payment proof after payment.</label>
                                        <input class="form-control form-control-lg form-control-solid" type="file"  name="proof" required  multiple />
                                                                            </div>
                                            <input type="hidden" name="amount" value="{{$amount}}">
                                            <input type="hidden" name="paymethd_method" value="{{$payment_mode->name}}">

                                            <div class="text-center mt-10">
                                                <button type="submit" class="btn btn-lg btn-primary btn-block fw-bolder me-3 my-2">
                                                    <span >Submit Payment</span>
                                                    <!-- <span wire:loading wire:target="addTicket">Processing Request...</span> -->
                                                </button>
                                            </div>
                                        </form>
                                        </form>
                                    </div>
                                @endif
                            @endif
                            {{-- Automatic Cryptopayment qrcode --}}
                            @if($title=="Complete Payment")
                                <div class="p-2 text-center p-md-5">
                                    <h4 class="">Send {{$amount}} to the below address or scan the {{$coin}} QR code to complete payment.</h4>
                                    <h4 class=""><strong>{{$p_address}}</strong></h4>
                                    <div>
                                        <img width="220" height="220" alt="Payment QR code" src="{{$p_qrcode}}">
                                    </div>	
                                    <div class="mt-3">
                                        <small>you can exit this page after scanning and completed payment, the system will keep track of your payment and update your account accordingly </small>
                                    </div>
                                </div>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
    <script>
        function myFunction() {
            /* Get the text field */
            var copyText = document.getElementById("myInput");
            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */
            /* Copy the text inside the text field */
            document.execCommand("copy");
            /* Alert the copied text */
            //alert("Copied the text: " + copyText.value);
            swal("Copied", copyText.value, "success");
            }
    </script>
    <script type="text/javascript">

        var stripe = Stripe("{{$settings->s_p_k}}");
        var elements = stripe.elements();
        var style = {
            base: {
                color: "#32325d",
            }
        };
        const paybtn = document.querySelector('#stripesubmit');
        console.log(paybtn);
        paybtn.disabled = true;

        var card = elements.create("card", { style: style });
        card.mount("#card-element");

        function checkcardforerrors() {
                card.on('change', function(event) {
                if (event.error) {
                    swal("Error", event.error.message, "error");
                    paybtn.disabled = true;
                } else {
                    paybtn.disabled = false;
                }
            });
        }
        checkcardforerrors();
        
        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(ev) {
            paybtn.disabled = true;
            ev.preventDefault();
            checkcardforerrors();
            document.getElementById('spinner').classList.remove('d-none');
            document.getElementById('buttontext').classList.add('d-none');
            
            // If the client secret was rendered server-side as a data-secret attribute
            // on the <form> element, you can retrieve it here by calling `form.dataset.secret`
            var clientSecret = "{{$intent}}";
            stripe.confirmCardPayment(clientSecret, {
                payment_method: {
                    card: card,
                    billing_details: {
                        name: "{{Auth::user()->name}}"
                    }
                }
            }).then(function(result) {
                if (result.error) {
                    swal("Error", 'There was an error processing your payment, Please try deposit again from deposit page', "error");
                    console.log(result.error.message);
                } else {
                    // The payment has been processed!
                    if (result.paymentIntent.status === 'succeeded') {
                        $.ajax({
                            url: "{{url('/dashboard/submit-stripe-payment')}}",
                            type: 'POST',
                            data:$('#selectform').serialize(),
                            success: function (data) {
                                swal("Success", data.success, "success");
                                setTimeout(function(){window.location.replace("{{route('accounthistory')}}"); }, 3000);
                            },
                            error: function (error) {
                                alert('Error Submiting Payment Data');
                                console.log(error);
                            },
                        });
                    }
                }
            });
            
        });
    </script>
@endsection