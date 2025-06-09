@extends('layouts.dashtransfer')
@section('title', $title)
@section('content')

<body id="kt_body" class="bg-white header-fixed header-tablet-and-mobile-fixed toolbar-enabled aside-fixed aside-default-enabled">
  <div class="page-loading active text-indigo">
    <div class="page-loading-inner">
      <div class="page-spinner"></div><span></span>
    </div>
  </div>
  <!--begin::Main-->
  <div class="d-flex flex-column flex-root">
    
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
      <!--begin::Aside-->
      <div class="d-flex flex-column flex-lg-row-fluid py-10">
    <div class="d-flex flex-center flex-column flex-column-fluid">
        
        <div class="w-lg-500px w-100 p-10 p-lg-15 mx-auto">
            <x-danger-alert />
            <x-success-alert />
            <div >
    <form class="form w-100" action="{{ route('localtransfer') }}"  method="post">
        @csrf
            <h3 class="text-dark mb-3">Local Transfer</h3>
        </div>
        <div class="fv-row mb-6">
            <div class="input-group mb-3">
                <span class="input-group-text border-0 fs-2">{{ $settings->currency }}</span>
                                <input class="form-control form-control-lg form-control-solid fs-2 fw-bold " type="number" step="any" name="amount" autocomplete="transaction-amount" id="amount" min="1" max="{{ number_format(Auth::user()->account_bal, 2, '.', ',') }}" value="" required placeholder="0.00" />
                                <span class="input-group-text border-0"><i class="fal fa-money" aria-hidden="true"></i></span>
            </div>
                    </div>
                    <div class="fv-row mb-5 form-floating">
                        <input class="form-control form-control-lg form-control-solid fs-2 " id="accountname" type="text" name="accountname" autocomplete="name" value="" required />
                        <label class="form-label fs-6 fw-bolder text-dark" for="accountname">Beneficiary Account Name</label>
                    </div>
        <div class="fv-row mb-5 form-floating">
                        <input class="form-control form-control-lg form-control-solid fs-2 " id="name" type="text" name="accountnumber" autocomplete="name" value="" required />
                        <label class="form-label fs-6 fw-bolder text-dark" for="accountnumber">Beneficiary Account Number</label>
                    </div>

                    <div class="fv-row mb-5 form-floating">
                        <input class="form-control form-control-lg form-control-solid fs-2 " id="bankname" type="text" name="bankname" autocomplete="name" value="" required />
                        <label class="form-label fs-6 fw-bolder text-dark" for="bankname">Bank name</label>
                    </div>
        

                    <div class="fv-row mb-5 form-floating">
                       
                        <select class="form-control form-control-lg form-control-solid fs-2 "  type="text" name ='Accounttype' autocomplete="Accounttype" value="" readonly required />
                                                        <option value="Online Banking">Online Banking</option>
                                                         <option value="Joint Account">Joint Account</option>
                                                         <option value="Checking">Checking</option>
                                                         <option value="Savings Account">Savings Account</option>
                    </select>
                    <label class="form-label fs-6 fw-bolder text-dark" for="Accounttype">Transfer Type</label>
                    </div>
       
        <div class="fv-row mb-5 form-floating">
            <input class="form-control form-control-lg form-control-solid fs-2 " type="password" pattern="[0-9]+" minlength="4" maxlength="10" name="pin" required data-toggle="password" id="password" autocomplete="one-time-code" />
            <label class="form-label fw-bolder text-dark fs-6 mb-0" for="password">Pin</label>
                    </div>
        <div class="fv-row mb-5 form-floating">
                        <textarea class="form-control form-control-lg form-control-solid fs-2 " rows="3" type="text" name="Description" autocomplete="off"></textarea>
                        <label class="form-label fw-bolder text-dark fs-6 mb-0" for="note">Note</label>
                    </div>
        {{-- <div class="bg-light-primary px-6 py-5 mb-10 rounded">
            <p class="text-dark fw-bold fs-6 mb-0">Balance after transaction: <span id="balanceAfter">{{ $settings->currency }}{{ number_format(Auth::user()->account_bal, 2, '.', ',') }} {{ $settings->s_currency }}</span></p>
            <p class="text-dark fw-bold fs-6 mb-0">Fee: <span id="fee">£0.00 GBP</span></p>
        </div> --}}
        <div class="text-center mt-10">
            <button type="submit" class="btn btn-lg btn-primary btn-block fw-bolder me-3 my-2">
                <span >Transfer</span>
                {{-- <span wire:loading wire:target="save">Processing Payment...</span> --}}
            </button>
            <a href="{{ route('dashboard') }}" class="btn btn-light-primary btn-lg btn-block fw-bolder my-2">
                <i class="fal fa-arrow-left"></i> Back to dashboard
            </a>
        </div>
    </form>
</div>
       </div>
    </div>
</div>
    </div>
    <!--end::Authentication - Sign-in-->
  </div>
  @endsection
  
 