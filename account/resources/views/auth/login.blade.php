@extends('layouts.guest2')

@section('title', 'Account Login')
@section('content')
   
  <!--begin::Main-->
  <div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
      <!--begin::Aside-->
      <div class="d-flex flex-column flex-lg-row-auto bg-primary w-xl-600px positon-xl-relative d-none d-xl-block">
        <!--begin::Wrapper-->
        <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
          <!--begin::Header-->
          <div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
            <!--begin::Logo-->
            <a href="" class="py-9 pt-lg-20">
              <img alt="Logo" src="{{ asset('storage/app/public/' . $settings->logo) }}" style="height:auto; max-width:30%;"/>
            </a>
            <!--end::Logo-->
            <!--begin::Title-->
            <h1 class="fw-bolder text-white fs-2qx pb-5 pb-md-10">Swift Money Transfer</h1>
            <!--end::Title-->
            <!--begin::Description-->
            <p class="fw-bold fs-2 text-white">Swift and Secure Money Transfer to any bank account will become a breeze with {{ $settings->site_name }}.
            </p>
            <!--end::Description-->
          </div>
          <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-300px" style="background- background-image: url({{ asset('dash2/konanauth/public/dashboard/media/illustrations/sport.png') }})" ></div>
          <!--end::Header-->
        </div>
        <!--end::Wrapper-->
      </div>
      <div class="d-flex flex-column flex-lg-row-fluid py-10 ">
  <div class="d-flex flex-center flex-column flex-column-fluid">
   <div class="text-center">
                                            <a href="/">
                                                <img src="{{ asset('storage/app/public/' . $settings->logo) }}"
                                                    alt="Logo" class="w-50">
                                            </a>
                                        </div>
                                        
                                         
    <div class="w-lg-600px w-100 w-100 p-10 p-lg-15 mx-auto">
        @if (Session::has('status'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('status') }}
            {{-- <button type="button" class="close" data-dismiss="alert"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> --}}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            {{-- <button type="button" class="text-white close" data-dismiss="alert"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> --}}
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
      <div class='card-body' >

           
        <form class="form w-100"  method="POST" action="{{ route('login') }}"  id="kt_sign_up_form" novalidate="novalidate">
          @csrf 
          <div class="text-center mb-10">
            <h1 class="text-dark mb-3">Sign In to {{ $settings->site_name }}</h1>
             <h4 class="alert-text">Access the {{$settings->site_name}} panel using your email and password.</h4>
            <!--<div class="text-gray-600 fw-bold fs-4">New Here?-->
            <!--    <a href="{{ route('register') }}" class="link-primary fw-bolder">Create an Account</a>-->
            <!--</div>-->
        </div>
        <div class="fv-row mb-6">
            <label class="form-label fs-6 fw-bolder text-dark">Email</label>
            <input class="form-control form-control-lg form-control-solid" type="email" name="email" autocomplete="email"  required placeholder="name@email.com" />
                    </div>
        <div class="fv-row mb-10">
            <div class="d-flex flex-stack mb-2">
                <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                <a href="{{ route('password.request') }}" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
            </div>
            <div class="position-relative mb-3">
                <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" required data-toggle="password" id="password"   placeholder="XXXXXXXXX"/>
                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2 input-password" data-kt-password-meter-control="visibility">
                  <i class="bi bi-eye fs-2 text-dark"></i>
                </span>
              </div>
                    </div>
        <div class="form-check form-check-custom form-check-solid mb-6">
            <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="remember_me" checked />
            <label class="form-check-label" for="flexCheckDefault">Stayed signed in for 30 days</label>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary btn-block fw-bolder me-3 my-2">
                <span >Sign In</span>
               
            </button>
                      <a href="{{ route('register') }}" class="btn btn-secondary btn-block btn-lg fw-bolder my-2">
               Not enrolled?Create Account  <i class="fas fa-sign-in"></i>
            </a>
                            
                                   
                    </div>
    </form>
</div>
   </div>
  </div>


@endsection
