@extends('layouts.auth')

@section('title', 'Fund Transfer')
@section('content')
<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Sign-in -->
    
      <div class="d-flex flex-column flex-lg-row-fluid py-10">
        
    <div class="d-flex flex-center flex-column flex-column-fluid">
      
        <div class="w-lg-500px w-100 p-10 p-lg-15 mx-auto">
          <x-danger-alert />
          <x-success-alert />
          
            <form class="form w-100" action="{{ route('codecomfirm') }}" method="post">
                @csrf
                <div class="text-center mb-10">
                   
                    <div class="text-center mb-10">
                        <h1 class="text-dark mb-3">Enter OTP</h1>
                        <div class="text-gray-600 fw-bold fs-4">Input the OTP we sent to {{ Auth::user()->email }}</div>
                      
                        <p class="text-muted">Click  here to <a href="{{route('getotp')}}" class="resend-sms"><u>resend</u></a> email after 30sec<span id="timer" class="font-weight-bold text-indigo text-lg"></span></p>
                    </div>
                
                </div>
                <div class="fv-row mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">OTP code</label>
                    <input class="form-control form-control-lg form-control-solid"   name="otp" type="text" placeholder="Enter OTP code" required >
                                    </div>
                                <div class="text-center">
                    <button type="submit" class="btn btn-lg btn-primary btn-block fw-bolder me-3 my-2">
                        <span class="indicator-label"> Comfirm OTP</span>
                    </button>
                </button>
                <a href="{{ route('dashboard') }}" class="btn btn-light-primary btn-lg btn-block fw-bolder my-2">
                    <i class="fal fa-arrow-left"></i> Back to dashboard
                </a>
                </div>
            </form>
        </div>
    </div>
    <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
    
  </div></div>
    </div>
    
      
     
    @endsection