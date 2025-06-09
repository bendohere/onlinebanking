@extends('layouts.guest2')

@section('title', 'Manager Login')
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
            <a href="/" class="py-9 pt-lg-20">
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
      <div class="d-flex flex-column flex-lg-row-fluid py-10">
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
            {{-- <button type="button" class="text-dark close" data-dismiss="alert"
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
      <div >
                            <h4 class="text-center card-title">Manager Login</h4>
                            <form method="POST" action="{{ route('adminlogin') }}"  class="mt-4 login-form">
                                 @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        @error('email')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group fv-row mb-5">
                                            <label class='form-label fs-6 fw-bolder text-dark'>Your Email <span class="text-danger">*</span></label>
                                            <div class="position-relative">
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <input type="email" class="form-control form-control-lg form-control-solid" name ="email" value="{{ old('email') }}" id="email" placeholder="name@example.com" required>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                        <br>
                                    <div class="col-lg-12">
                                        <div class="fv-row mb-5">
                                            <label class='form-label fs-6 fw-bolder text-dark'>Password <span class="text-danger">*</span></label>
                                            <div class="position-relative">
                                                <i data-feather="key" class="fea icon-sm icons"></i>
                                                <input type="password" class="form-control form-control-lg form-control-solid" name="password" id="password" placeholder="Enter Password" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-between">
                                            <div class="form-group">
                                                
                                            </div>
                                            <p class="mb-0 forgot-pass"><a href="{{ route('admin.forgetpassword') }}"
                                                    class="text-d font-weight-bold">Forgot password ?</a></p>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="mb-0 col-lg-12">
                                        <button class="btn btn-lg btn-primary btn-block fw-bolder me-3 my-2" type="submit">Sign in</button>
                                    </div>
                                    <!--end col-->
                                    
                                    <div class="text-center col-12">
                                        <p class="mt-4 mb-0"><small class="mr-2 text-dark">&copy; Copyright  {{date('Y')}} &nbsp; {{$settings->site_name}} &nbsp; All Rights Reserved.</small>
                                        </p>
                                    </div>
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                    </div>
                   </div>
                 
                 
                 @endsection