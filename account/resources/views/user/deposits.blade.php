@extends('layouts.dash2')
@section('title', $title)
@section('content')
    
<div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">
	<x-danger-alert />
    <x-success-alert />
	<div class="card-body text-wrap">
	
		
<div class="post fs-6 d-flex flex-column-fluid min-vh-100" id="kt_post">


  <div class="container col-lg-8">
  <div>
    <h1> Deposit</h1>
  </div>


		<div class="card mb-10">
		  <div class="card-body">
			<form action="{{route('newdeposit')  }}" method="post">
                @csrf  
			  <div class="fv-row mb-6">
				<label class="form-label fs-6 fw-bolder text-dark">Deposit From</label>
				<select class="form-select form-select-solid" name="payment_method"  required>
                    @forelse ($dmethods as $method)
                    <option value="{{ $method->name }}">{{ $method->name }}</option>
                    @empty
                    <option value="">No Payment Method enabled at the moment, please check
                      back later</option>
                    @endforelse
				</select>
													</div>
								<div class="fv-row mb-6">
									<label class="form-label fs-6 fw-bolder text-dark">Amount {{ $settings->currency }}</label>
									<input class="form-control form-control-lg form-control-solid" type="text" name='amount' required placeholder="Enter amount {{ $settings->currency }}" />
								</div>

							
								<div class="text-center mt-10">
									<button type="submit" class="btn btn-lg btn-primary btn-block fw-bolder me-3 my-2">
										<span >Continue</span>
										<!-- <span wire:loading wire:target="addTicket">Processing Request...</span> -->
									</button>
								</div>
			</form>
		  </div>
	  
	 
	  </div>
	</div>
  </div>
</div>
</div>
  </div>
  
@endsection