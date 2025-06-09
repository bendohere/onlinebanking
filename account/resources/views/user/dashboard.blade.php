@extends('layouts.dash2')
@section('title', $title)
@section('content')

   


<div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">
    <x-danger-alert />
    <x-success-alert />

<div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
<div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
  <h1 class="text-dark fw-bolder my-1 fs-2">Welcome {{ Auth::user()->name }} {{Auth::user()->middlename}} {{Auth::user()->lastname}}, 👋🏼</h1>
  <p class="text-dark">Hi, What would you like to do?</p>
</div>
<!--end::Info-->
<!--begin::Actions-->
<div class="d-flex align-items-center flex-nowrap text-nowrap py-1 mb-10">
  <button id="kt_bank_account_button" class="btn btn-white text-dark me-4"><i class="fal fa-plus"></i> Cash Top Up</button>
  <div id="kt_bank_account" class="bg-white" data-kt-drawer="true" data-kt-drawer-activate="true" data-kt-drawer-toggle="#kt_bank_account_button" data-kt-drawer-close="#kt_bank_account_close">
    <div class="card w-100">
      <div class="card-header pe-5 border-0">
        <div class="card-title">
          <div class="d-flex justify-content-center flex-column me-3">
            <div class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 lh-1">Bank Account</div>
          </div>
        </div>
        <div class="card-toolbar">
          <div class="btn btn-sm btn-icon btn-icon-dark btn-active-light-primary" data-kt-drawer-dismiss="true" id="kt_bank_account_close">
            <span class="svg-icon svg-icon-2">
              <i class="fal fa-times"></i>
            </span>
          </div>
        </div>
      </div>
      <div class="card-body text-wrap">
                    <div class="d-flex flex-column">
          <div class="btn-wrapper text-center mb-3">
            <div class="symbol symbol-100px symbol-circle me-5 mb-10">
              <div class="symbol-label fs-1 text-dark">
                <i class="fal fa-university fa-2x"></i>
              </div>
            </div>
            <p class="text-dark fs-1 fw-bolder">{{ $settings->site_name }}</p>
            <p class="text-dark fs-6 fw-bold">{{ $settings->address }}</p>
          </div>
          <div class="bg-light px-6 py-5 mb-10 rounded">
            <p class="text-dark fs-6 fw-bolder">Account Details</p>
            <li class="d-flex align-items-center py-2">
              <span class="bullet me-5 bg-primary bullet-vertical"></span> <span>Account Name:{{ Auth::user()->name }} {{ Auth::user()->lastname }} <i class="fal fa-clone castro-copy fs-5" data-clipboard-text="John Doe" title="Copy"></i></span>
            </li>
            <li class="d-flex align-items-center py-2">
              <span class="bullet me-5 bg-primary bullet-vertical"></span> <span>Account Number: {{ Auth::user()->usernumber }} <i class="fal fa-clone castro-copy fs-5" data-clipboard-text="02361522" title="Copy"></i></span>
            </li>
            <li class="d-flex align-items-center py-2">
              <span class="bullet me-5 bg-primary bullet-vertical"></span> <span>Sort code: 388130 <i class="fal fa-clone castro-copy fs-5" data-clipboard-text="388130" title="Copy"></i></span>
            </li>
                          
                                      
                                            <li class="d-flex align-items-center py-2">
              <span class="bullet me-5 bg-primary bullet-vertical"></span> <span>Payment Reference: 1234567890 <i class="fal fa-clone castro-copy fs-5" data-clipboard-text="1234567890" title="Copy"></i></span>
            </li>
                          </div>
        </div>
                    <div class="alert alert-primary d-flex align-items-center p-5">
          <i class="fal fa-info-circle me-2 fs-2"></i>
          <div class="d-flex flex-column">
            <p class="text-dark mb-0">Payment reference helps {{$settings->site_name}} track payments faster,<br> you must include it in wire transfer description.</p>
          </div>
        </div>
                    
          
                  </div>
    </div>
  </div>
  <button id="kt_send_money_button" class="btn btn-dark"><i class="fal fa-institution"></i> Send Money</button>
  <div id="kt_send_money" class="bg-white" data-kt-drawer="true" data-kt-drawer-activate="true" data-kt-drawer-toggle="#kt_send_money_button" data-kt-drawer-close="#kt_send_money_close">
    <div class="card w-100">
      <div class="card-header pe-5 border-0">
        <div class="card-title">
          <div class="d-flex justify-content-center flex-column me-3">
            <div class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 lh-1">Send Money</div>
          </div>
        </div>
        <div class="card-toolbar">
          <div class="btn btn-sm btn-icon btn-icon-dark btn-active-light-primary" data-kt-drawer-dismiss="true" id="kt_send_money_close">
            <span class="svg-icon svg-icon-2">
              <i class="fal fa-times"></i>
            </span>
          </div>
        </div>
      </div>
      <div class="card-body text-wrap">
        <div class="btn-wrapper text-center mb-3">
          <div class="symbol symbol-100px symbol-circle me-5 mb-10">
            <div class="symbol-label fs-1 text-dark">
              <i class="fal fa-arrow-down-arrow-up fa-2x"></i>
            </div>
          </div>
          <p class="text-dark fs-6">Swift and Secure Money Transfer </p>
        </div>
        <div class="pb-5 mt-10 position-relative zindex-1">
          <!--begin::Item-->
          <a href="{{ route('localtransfer') }}">
            <div class="d-flex flex-stack mb-6">
              <div class="d-flex align-items-center me-2">
                <div class="symbol symbol-45px me-5">
                  <span class="symbol-label bg-light-primary text-dark">
                    <i class="fal fa-user"></i>
                  </span>
                </div>
                <div>
                  <p class="fs-5 text-gray-800 text-hover-primary fw-bolder mb-0">Local Transfer</p>
                  <div class="fs-7 text-gray-800 fw-semibold">Easily send money Locally</div>
                  <div class="fs-7 text-gray-600 fw-semibold">
                                            0% Handling charges
                     </div>
                  </div>
                </div>
                <p class="btn btn-icon btn-light btn-sm">
                  <i class="fal fa-arrow-right text-dark"></i>
                </p>
              </div>
          </a>
        
          <a href="{{ route('internationaltransfer') }}">
            <div class="d-flex flex-stack mb-6">
              <div class="d-flex align-items-center me-2">
                <div class="symbol symbol-45px me-5">
                  <span class="symbol-label bg-light-primary text-dark">
                    <i class="fal fa-shuffle"></i>
                  </span>
                </div>
                <div>
                  <p class="fs-5 text-gray-800 text-hover-primary fw-bolder mb-0">International Wire Transfer</p>
                  <div class="fs-7 text-gray-800 fw-semibold">Wire transfer is executed under 72hours, Iban<br> & swiftcode are required.</div>
                  <div class="fs-7 text-gray-600 fw-semibold">
                                            0% 
                     </div>
                  </div>
                </div>
                <p class="btn btn-icon btn-light btn-sm">
                  <i class="fal fa-arrow-right text-dark"></i>
                </p>
              </div>
          </a>
          
          <!--end::Item-->
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="post fs-6 d-flex flex-column-fluid min-vh-100" id="kt_post">
<div class="container">
  <div class="row g-xl-8">
    <div>
<div class="card bg-transparent h-md-100" wire:poll>
    <div class="card-body p-0">
        <div class="px-9 pt-6 card-rounded w-100 bgi-no-repeat bgi-size-cover bgi-position-y-top bg-primary  h-250px ">
            <div class="d-flex flex-stack">
                
                    <div class="logged-user-i">
                      <div class="avatar-w">
                        <img alt="" src="{{$settings->site_address}}/storage/app/public/photos/{{Auth::user()->profile_photo_path}}" width="50" height="50" style='border-radius: 50%;'>
                      </div>
                      
                    </div>
                  
                                </div>
            <div class="fw-bold fs-5 text-center text-white pt-5 " >
                 <h1>Available Balance</h1>
                <span class="fw-bolder fs-2hx d-block mt-n1">
                    <span id="main_balance" >
                        {{ $settings->currency }}{{ number_format(Auth::user()->account_bal,0, '.', ',') }}  {{ $settings->s_currency }}                       </span>
                    {{-- <span class="ml-3 fs-3 cursor-pointer" wire:click="xBalance">
                        <i class="fal fa-eye-slash" id="hide_balance" ></i>
                        <i class="fal fa-eye" id="reveal_balance"  style="display:none;" ></i>
                    </span> --}}
                </span>
            </div>
        </div>
                    <div class="shadow-xs card-rounded mx-9 mb-3 px-6 py-9 position-relative z-index-1 bg-body" style="margin-top: -85px">
        
                                            
            
                            <div class="d-flex align-items-center ">
                <div class="symbol symbol-40px me-5">
                    <span class="symbol-label">
                        <i class="fal fa-shield text-dark"></i>
                    </span>
                </div>
                <div class="d-flex align-items-center flex-wrap w-100">
                    
                        <div class="mb-1 pe-3 flex-grow-1">
                            <div class="fs-4 text-dark text-hover-primary fw-bolder">Your Account Number</div>
                            <div class="text-gray-800 fw-semibold ml-3">{{ Auth::user()->usernumber }}</div>
                        </div>
                        <div class="col-md-6 col-12 text-md-end">
                            <a href="{{ route('accounthistory') }}" class="btn btn-sm btn-primary text-black mb-3"><i class="fa fa-heart-rate"></i> Transactions</a>
                                        <a href="{{ route('deposits') }}" class="btn btn-sm btn-primary text-white mb-3"><i class="fa fa-money"></i> Top up balance</a>
                                                   
                                      </div>
                </div>
            </div>
                        </div>
                </div>
</div>
</div><div class="row mr-3 ml-3 mt-2 mb-5">
    <div class="col-md-4  ">
        <div class="card card-stats rounded  ml-5">
          <div class="card-body">
            <div class="row ">
              <div class="col">
                <h4 class="font-weight-bolder mb-1"> Transcation Limit</h4>
                <p class="text-dark mb-1">Your current transcation limit</p>
                <p class="text-dark h3">{{ $settings->currency }}{{ number_format(Auth::user()->limit, 2, ',') }} </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 mt-3">
        <div class="card card-stats rounded mr-2 ml-2">
          <div class="card-body">
            <div class="row mt-2">
                
              <div class="col">
                <h4 class="font-weight-bolder mb-1">Pending Transaction </h4>
                <p class="text-dark mb-1">Total pending transactins currently</p>
                <p class="text-dark h3">{{ $settings->currency }}{{ number_format($total_deposited_pending + $total_withdrawal_pending, 2, '.', ',') }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 mt-3">
        <div class="card card-stats rounded mr-4 ">
          <div class="card-body">
            <div class="row mt-2">
              <div class="col">
                <h4 class="font-weight-bolder mb-1">Transaction Volume</h4>
                <p class="text-dark mb-1">Total Volume of transactions made</p>
                <p class="text-dark h3">{{ $settings->currency }}{{ number_format($total_withdrawal+$deposited, 2, '.', ',') }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
</div>

                    <div class="card card-flush rounded-4 mt-4">
            <div class="card-header align-items-center py-5 gap-2 gap-md-5" style="display:inline;">
                <h3>Recent Transactions</h3>
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table align-middle table-row-bordered table-row-gray-300 gy-5 gs-7" id="kt_datatable_example_5">
                        <thead>
                            <tr class="text-start text-dark fw-bolder fs-7 text-uppercase px-7">
                                <th></th>
                                <th class="min-w-150px">Amount</th>
                                <th>Type</th>
                                <th class="min-w-50px">Status</th>
                                <th class="min-w-50px">Reference ID</th>
                                <th class="min-w-200px">Created</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <tbody class="fw-semibold text-dark fs-6">
                            @foreach($withdrawals as $withdrawal )
<tr class="cursor-pointer" id="{{ $withdrawal->id }}{{ $withdrawal->txn_id }}">
    @if($withdrawal->type=='Credit') 
<td>
    <div class="symbol symbol-40px symbol-circle me-5">
        <div class="symbol-label fs-3 fw-bolder text-dark">
                            
            <i class="fal fa-plus"></i>
                        </div>
    </div>
   
</td>
@else
<td>
    <div class="symbol symbol-40px symbol-circle me-5">
        <div class="symbol-label fs-3 fw-bolder text-dark">
                            
            <i class="fal fa-minus"></i>
                        </div>
    </div>
   
</td>
@endif
<td>{{ $settings->currency }}{{ number_format($withdrawal->amount , 2, '.', ',') }} {{ $settings->s_currency }}</td>
@if($withdrawal->type=='Credit') 
<td><span class="badge badge-pill badge-success badge-sm">Credit</span></td>
@else
<td><span class="badge badge-pill badge-danger badge-sm">Debit</span></td>
@endif
<!--<td>{{ $withdrawal->accountname }}</td>-->
@if($withdrawal->status=='Pending')  
<td><span class="badge badge-pill badge-warning badge-sm">{{$withdrawal->status}}</span></td>
  @elseif($withdrawal->status=='On-hold')
  <td><span class="badge badge-pill badge-warning badge-sm">{{$withdrawal->status}}</span></td>
   @elseif($withdrawal->status=='Rejected')
  <td><span class="badge badge-pill badge-danger badge-sm">{{$withdrawal->status}}</span></td>
  @elseif($withdrawal->status=='Processed')
  <td><span class="badge badge-pill badge-success badge-sm">{{$withdrawal->status}}</span></td>
  @else
  <td><span class="badge badge-pill badge-danger badge-sm">{{$withdrawal->status}}</span></td>
  @endif  
<td>{{ $withdrawal->txn_id }}</td>
<td>{{ \Carbon\Carbon::parse($withdrawal->created_at)->toDayDateTimeString() }}</td>
</tr>
@endforeach

@foreach($deposits as $withdrawal )
<tr class="cursor-pointer" id="{{ $withdrawal->id }}{{ $withdrawal->txn_id }}">
    @if($withdrawal->type=='Credit') 
<td>
    <div class="symbol symbol-40px symbol-circle me-5">
        <div class="symbol-label fs-3 fw-bolder text-dark">
                            
            <i class="fal fa-plus"></i>
                        </div>
    </div>
   
</td>
@else
<td>
    <div class="symbol symbol-40px symbol-circle me-5">
        <div class="symbol-label fs-3 fw-bolder text-dark">
                            
            <i class="fal fa-minus"></i>
                        </div>
    </div>
   
</td>
@endif
<td>{{ $settings->currency }}{{ number_format($withdrawal->amount , 2, '.', ',') }} {{ $settings->s_currency }}</td>
<td><span class="text-success">Credit</span></td>
@if($withdrawal->status=='Pending')  
<td><span class="badge badge-pill badge-warning badge-sm">Pending</span></td>
  @else
  <td><span class="badge badge-pill badge-success badge-sm">Completed</span></td>
  @endif  
<td>{{ $withdrawal->txn_id }}</td>
<td>{{ \Carbon\Carbon::parse($withdrawal->created_at)->toDayDateTimeString() }}</td>
</tr>
@endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
   </div>
</div>




</div>
<!-- Livewire Component wire-end:WFPXAQH6iUfy5N0y5sa1 -->    </div>
</div>
</div>
</div>


@endsection