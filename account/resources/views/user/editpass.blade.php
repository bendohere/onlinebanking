@extends('layouts.dash2')
@section('title', $title)
@section('content')
    
<div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">
	
	
		
<div class="post fs-6 d-flex flex-column-fluid min-vh-100" id="kt_post">
  <div class="container col-lg-8 col-md-8">
    
    <div >
    <div class="modal-dialog" role="document">
        <div class="modal-content card-body">
            <div class="modal-header border-0">
                <h3 class="modal-title">Reset Password</h3>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                   
                </div>
            </div>
            <div class="modal-body">
                <form  action = "{{route('updateuserpass')}}"  method="post" class="mb-10">
                    @csrf
                    @method('PUT')
                    <div class="fv-row mb-6 form-floating">
                        <input type="password" current_password id="password" class="form-control form-control-lg form-control-solid"   name="current_password" required>
                        <label class="form-label fw-bolder text-dark fs-6 mb-0" for="current_password">Current password</label>
                                                </div>
                    <div class="fv-row mb-6 form-floating">
                        <input type="password" name="password" id="new_password" class="form-control form-control-lg form-control-solid" required>
                        <label class="form-label fw-bolder text-dark fs-6 mb-0" for="password">New password</label>
                                                </div>
                    <div class="fv-row mb-6 form-floating">
                        <input type="password" name="password_confirmation" id="confirm_password" class="form-control form-control-lg form-control-solid" required>
                        <label class="form-label fw-bolder text-dark fs-6 mb-0" for="confirm_password">Confirm password</label>
                                                </div>
                                                <br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block">
                            <span >Change Password</span>
                            <!-- <span wire:loading wire:target="resetPassword">Processing Request...</span> -->
                        </button>
                    </div>
                </form>
                <div class="bg-light px-6 py-5 mb-10 rounded">
                    <h4 class="mb-0 text-dark">Password requirements</h4>
                    <p class="mb-2 text-gray-800 fs-6">Ensure that these requirements are met</p>
                    <ul class="text-gray-800 fs-6">
                        <li class="d-flex align-items-center"><span class="bullet me-5 bg-primary bullet-vertical"></span>Minimum 8 characters long - the more, the better</li>
                        <li class="d-flex align-items-center"><span class="bullet me-5 bg-primary bullet-vertical"></span>At least one lowercase character.</li>
                        <li class="d-flex align-items-center"><span class="bullet me-5 bg-primary bullet-vertical"></span>At least one uppercase character.</li>
                        <li class="d-flex align-items-center"><span class="bullet me-5 bg-primary bullet-vertical"></span>At least one number.</li>
                    </ul>
                </div>
            </div>
        </div>
    
	</div>
  </div>
</div>
</div>
  </div>
  
@endsection