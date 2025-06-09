@extends('layouts.dash2')
@section('title', $title)
@section('content')

<div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">
  <div wire:id="07JLZ1I8wtzQJVyhmJtD" >

    <div><x-danger-alert />
      <x-success-alert />
  <div class="toolbar" id="kt_toolbar">
<div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
<div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
  <h1 class="text-dark fw-bolder my-1 fs-2 mb-6">Settings</h1>
  <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6 border-gray-300" id="tabs-icons-text" role="tablist">
    <li class="nav-item">
      <a class="nav-link text-dark  active " id="tabs-icons-text-1-tab" href="{{ route('profile') }}" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-dark " id="tabs-icons-text-2-tab" href="{{ route('editpass') }}" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">Security</a>
    </li>
    
    <li class="nav-item" data-bs-toggle="modal" data-bs-target="#resetpassword">
      <a class="nav-link text-dark " id="tabs-icons-text-2-tab" href="#" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">Upload profile picture</a>
    </li>

    <li class="nav-item" data-bs-toggle="modal" data-bs-target="#resetpin">
      <a class="nav-link text-dark " id="tabs-icons-text-2-tab" href="#" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">Change Transaction Pin</a>
    </li>
  </ul>
</div>
<div class='d-flex flex-column align-items-end justify-content-end flex-wrap me-2'>
  
  <img src="{{$settings->site_address}}/storage/app/public/photos/{{Auth::user()->profile_photo_path}}" style="height: 100px; width: 100px;
                            
  border-radius:40px;
  border: solid 5px;
  border-color: white;
  
  " alt="">
</div>
</div>



  <div class="post fs-6 d-flex flex-column-fluid min-vh-100" id="kt_post">
  <div class="container">
      <div>
        <div >
          <div class="card mb-10">
        
            <div class="card-body">
              <form action="#" method="post">
                             <div class="row fv-row">
                              
                  <div class="col-xl-6 mb-6">
                    <label class="form-label fw-bolder text-dark fs-6">First Name</label>
                    <input class="form-control form-control-lg form-control-solid" type="text" name="name"  autocomplete="off" value="{{ Auth::user()->name }}" required readonly />
                                      </div>
                  <div class="col-xl-6 mb-6">
                    <label class="form-label fw-bolder text-dark fs-6">Last Name</label>
                    <input class="form-control form-control-lg form-control-solid" type="text" name="lastname" autocomplete="off" value="{{ Auth::user()->lastname }}" required readonly />
                                      </div>
                </div>
                
                 <div class="fv-row mb-6">
                  <label class="form-label fs-6 fw-bolder text-dark">Account Number</label>
                  <input class="form-control form-control-lg form-control-solid" type="email" name="text"  value="{{ Auth::user()->usernumber }} " required readonly/>
                                  </div>
                <div class="fv-row mb-6">
                  <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                  <input class="form-control form-control-lg form-control-solid" type="email" name="email" autocomplete="email" value="{{ Auth::user()->email }} " required readonly/>
                                  </div>

                            
                              <div class="fv-row mb-6">
                                <label class="form-label fs-6 fw-bolder text-dark">Dirth of birth</label>
                                <input class="form-control form-control-lg form-control-solid" type="date" name="dob" autocomplete="date" value="{{ Auth::user()->dob }}" required readonly/>
                                                </div>
                <div class="fv-row mb-6">
                  <label class="form-label fs-6 fw-bolder text-dark">Phone</label>
                  <div class="input-group mb-3">
                   
                    <input class="form-control form-control-lg form-control-solid" type="tel" name="phone" autocomplete="phone" value="{{ Auth::user()->phone }}" required placeholder="123456789" readonly/>
                  </div>
                                  </div>


 <div class="fv-row mb-6">
                  <label class="form-label fs-6 fw-bolder text-dark">Address</label>
                  <div class="input-group mb-3">
                   
                    <input class="form-control form-control-lg form-control-solid" type="tel" name="address"  value="{{ Auth::user()->address }}"  readonly/>
                  </div>
                                  </div>

                                
              </form>
            </div>
          </div>
        </div>


      </div>
  </div>
</div>
</div>
</div>
</div>
<div >
  <div wire:ignore.self class="modal fade" id="resetpassword" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header border-0">
                  <h3 class="modal-title">Upload Profile</h3>
                  <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                      <span class="svg-icon svg-icon-1">
                          <i class="fal fa-times"></i>
                      </span>
                  </div>
              </div>
              <div class="modal-body">
                  <form  action ='{{ route('updateprofilephoto') }}' method="post" class="mb-10" enctype="multipart/form-data">
                    @csrf
                      <div class="fv-row mb-6 form-floating">
                          <input type="file" name='photo' class="form-control form-control-lg form-control-solid" required>
                          <label class="form-label fw-bolder text-dark fs-6 mb-0" for="new_password">Profile Picture</label>
                                                  </div>
                      
                      <div class="text-center">
                          <button type="submit" class="btn btn-primary btn-block">
                              <span >Upload Profile Picture</span>
                             
                          </button>
                      </div>
                  </form>
                  
              </div>
          </div>
      </div>
  </div>




  <div wire:ignore.self class="modal fade" id="resetpin" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h3 class="modal-title">Reset Transaction Pin</h3>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-1">
                        <i class="fal fa-times"></i>
                    </span>
                </div>
            </div>
            <div class="modal-body">
                <form  action ='{{ route('changepin') }}' method="post" class="mb-10">
                  @csrf
                  @method('PUT')
                    <div class="fv-row mb-6 form-floating">
                        <input type="password" name='pin' class="form-control form-control-lg form-control-solid" required>
                        <label class="form-label fw-bolder text-dark fs-6 mb-0" for="new_password">Digit Transaction Pin </label>
                                                </div>

                      <div class="fv-row mb-6 form-floating">
                             <input type="password" name='password' class="form-control form-control-lg form-control-solid" required>
                           <label class="form-label fw-bolder text-dark fs-6 mb-0" for="new_password"> Password </label>
                                                                          </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block">
                            <span >Change Transaction Pin</span>
                           
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>

@endsection