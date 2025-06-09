@extends('layouts.guest2')

@section('title', 'Forgot Password')
@section('content')
   
  <!--begin::Main-->
  <div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
      <!--begin::Aside-->
      
      <div class="d-flex flex-column flex-lg-row-fluid py-10">
  <div class="d-flex flex-center flex-column flex-column-fluid">
   
    <div class="w-lg-600px w-100 w-100 p-10 p-lg-15 mx-auto">
      @if(Session::has('message'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ Session::get('message') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
     
      @endif

      @if (session('status'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('status') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      @endif   
   
      <div >
                        
                    
                   
                        <div class="card-body">
                            <h2 class='text-muted text-cente'> Insert the email you created the account with and we'll send you a reset link.
                            </h2>
                            <h4 class="text-center card-title">Password Reset</h4>
                            <form method="POST" action="{{ route('password.email') }}"  class="mt-4 login-form">
                                 @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Your Email <span class="text-danger">*</span></label>
                                            <div class="position-relative">
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <input type="email" class="form-control form-control-lg form-control-solid" name ="email" value="{{ old('email') }}" id="email" placeholder="name@example.com" required>
                                            </div>
                                            @if ($errors->has('email'))
                                                <span class="help-block text-danger">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!--end col-->

                                    
                                    <div class="mb-0 col-lg-12">
                                        <button class="btn btn-lg btn-primary btn-block fw-bolder me-3 my-2" type="submit">Email Password Reset Link</button>
                                    </div>
                                    <!--end col-->


                                    <div class="text-center col-12">
                                        <p class="mt-3 mb-0"><small class="mr-2 text-dark">Repeat Login
                                                ?</small> <a href="{{route('login')}}"
                                                class="text-dark font-weight-bold">Login</a></p>
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
                    <!---->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
       
        <!--end container-->
    </section>
    <!--end section-->



@endsection

@section('scripts')
@parent

@endsection