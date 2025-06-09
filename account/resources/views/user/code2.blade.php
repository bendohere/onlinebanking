@extends('layouts.auth')

@section('title', 'Fund Transfer')
@section('content')
<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Sign-in -->
    <!--<div class="d-flex flex-column flex-lg-row flex-column-fluid">-->
      <!--begin::Aside-->
      
    <!--  </div>-->
      <div class="d-flex flex-column flex-lg-row-fluid py-10">
        
    <div class="d-flex flex-center flex-column flex-column-fluid">
      
        <div class="w-lg-500px w-100 p-10 p-lg-15 mx-auto">
          <x-danger-alert />
          <x-success-alert />
          <div class='text-center mb-3'>
                     <i class="fal fa-info-circle  fa-4x text-danger"></i>
                </div>
          
            <form class="form w-100" action="{{ route('codecomfirm') }}" method="post">
                @csrf
                <div class="text-center mb-10">
                    <h1 class=" mb-3 text-danger">Before you proceed!</h1>
                    <div class="text-gray-600 fw-bold fs-4"> {{$settings->code2message}}</div>
                
                </div>
                <div class="fv-row mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">{{ $settings->code2 }} Code</label>
                    <input class="form-control form-control-lg form-control-solid" name="code2"   type="text" placeholder="Enter {{ $settings->code2 }} code"  required>
                                    </div>
                                <div class="text-center">
                    <button type="submit" class="btn btn-lg btn-primary btn-block fw-bolder me-3 my-2">
                        <span class="indicator-label"> Comfirm {{$settings->code2}} code</span>
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