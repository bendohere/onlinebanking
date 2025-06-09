@extends('layouts.auth')

@section('title', 'Pin Verification')
@section('content')
<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Sign-in -->
    
      <div class="d-flex flex-column flex-lg-row-fluid py-10 mt-19">
        
    <div class="d-flex flex-center flex-column flex-column-fluid">
      
        <div class="w-lg-500px w-100 p-10 p-lg-15 mx-auto ">
          <x-danger-alert />
          <x-success-alert />
          
           @if(Auth::user()->status !='blocked')
                 
             
            <form class="form w-100" action="{{ route('pinstatus') }}" method="post">
                @csrf
                <div class="text-center mb-10">
                   
                    <div class="text-center mb-10">
                        <div class="logged-user-i">
                            <div class="avatar-w">
                              <img alt="" src="{{$settings->site_address}}/storage/app/public/photos/{{Auth::user()->profile_photo_path}}" width="100" height="100" style='border-radius: 50%;'>
                            </div>
                            <h1> {{Auth::user()->name}} {{Auth::user()->middlename}} {{Auth::user()->lastname}}</h1>
                          </div>
                        
                    </div>
                
                </div>
                <div class="fv-row mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">Enter your 4 digit verification pin</label>
                    <input class="form-control form-control-lg form-control-solid" name="pin"  maxlength='5' minlength = "4" type="text" placeholder="Enter your 4 digit verification pin" >
                                    </div>
                                <div class="text-center">
                    <button type="submit" class="btn btn-lg btn-primary btn-block fw-bolder me-3 my-2">
                        <span class="indicator-label"> Verify</span>
                   
                </button>
                
                </div>
            </form>
            
            
             @else
             
             
             <div class="alert alert-danger" role="alert">
                <div class='text-center mb-5'>
                     <i class="fal fa-info-circle  fa-3x"></i>
                </div>
  <h4 class="alert-heading text-center">Account Blocked</h4>
  <p>We have blocked your {{$settings->site_name}}  account as a security protection.</p>
  <hr>
  <p class="mb-0">To unblock, contact support on {{$settings->contact_email}} or our livechat</p>
</div>
             
           
             
             @endif
        </div>
    </div>
    <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
    
  </div></div>
    </div>
    
      
     
    @endsection