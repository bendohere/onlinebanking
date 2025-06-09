@extends('layouts.guest2')

@section('title', 'Manager Login')
@section('content')
   

<body class="bg-primary dd-bg">
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-dark">
      <div class="container">
          
              
            </div>
          </div>
        </div>
      </div>
    </nav>
    <div class="main-content">
     
      <div class="container pt-7">
          <div class="row justify-content-center">
              <div class="col-lg-5 col-md-7">
                  <div class="card rounded mb-5">
                    @if (Session::has('message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @else
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Your registration is successful. A verification link has been sent to your email address, please
                        click on the link to verify your email address.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    A verification link has been sent to the email address, please click on the link to verify your
                    email address.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
                      <div class="card-body pt-7 px-5">
                          <div class="text-dark mb-5">
                              <div class="row justify-content-center">
                                  <div class="col-md-8">
                                      <div class="card-profile-image mb-5">
                                         
                                      </div>
                                  </div>
                              </div>
                              <div class="btn-wrapper text-center mb-3">
                                  <a href="javascript:void;" class="mb-3">
                                      <span class=""><i class="fal fa-envelope fa-4x text-indigo"></i></span>
                                  </a>
                              </div>
                              <h3 class="font-weight-bold">Check your mailbox</h3>
                              <p class="mb-3">We’ve sent you an email with a link to confirm your account.</p>
                              <h3 class="font-weight-bold">Didn&#039;t get the email?</h3>
                              <ol>
                                  <li>The email is in your spam folder.</li>
                                  <li>The email address you entered had a typo.</li>
                                  <li>You accidentally entered another email address. (Usually happens with auto-complete.)</li>
                                  <li>We can’t deliver the email to this address. (Usually because of corporate firewalls or filtering.)</li>
                              </ol>
                            <div>
                               <a   class="btn btn-primary btn-block pad " href="{{ route('verification.send') }}" onclick="event.preventDefault();
                                document.getElementById('verification').submit();"> <i class="fal fa-message"></i>  Didn&#039;t get the email?  click here to resend
                               <form id="verification" action="{{ route('verification.send') }}" method="POST"
                               style="display: none;">
                               {{ csrf_field() }}
                             </form>
                            </a>
                              <!--<form method="POST" action="{{ route('verification.send') }}" class="mt-4 login-form">-->
                              <!--    @csrf-->
                              <!--    <button class="btn btn-success btn-block pad" type="submit">Didn&#039;t get the email?</button>-->
                              <!--</div>-->
                              <div>
                                <br>
                                <a   class="btn btn-danger btn-block pad" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"> <i class="fal fa-sign-out"></i>Sign Out
                               <form id="logout-form" action="{{ route('logout') }}" method="POST"
                               style="display: none;">
                               {{ csrf_field() }}
                             </form>
                            </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
        
    
    
  



@endsection
