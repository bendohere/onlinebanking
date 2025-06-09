@extends('layouts.dash2')
@section('title', $title)
@section('content')
    <!-- Page title -->
    <div class="page-title">
        <div class="row justify-content-between align-items-center">
            <div class="mb-3 col-md-6 mb-md-0">
                {{-- <h5 class="mb-0 text-white h3 font-weight-400">Account Verification</h5> --}}
            </div>
        </div>
    </div>
    
    <div class="row">
        <x-danger-alert />
    <x-success-alert />
    <x-error-alert />
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-5 row">
                        <div class="col-lg-8 offset-lg-2 col-sm-12">
                            <div class="p-3 text-center">
                                <h2 class="">Account Information</h2>
                                <p>To comply with regulation, please enter your information to proceed to the next step so we can continue building your account.</p>
                            </div>
                            <div class="p-2 shadow-lg">
                                <div class="p-4 row">
                                    <form action="{{ route('kycsubmit') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-12 border-bottom">
                                            <h5>Personal Details</h5>
                                            <p>Your simple personal information required for identification</p>
                                        </div>
                                        <div class="col-12">
                                            <small> Kindly provide the information requested below to enable us create an account for you.</small>
                                        </div>
                                        <div class="mt-4 col-12">
                                            <div class="row">
                                                <div class="mb-2 col-md-6">
                                                    <label for="zipcode">Full Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="name"  value='{{ Auth::user()->name }} {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}' class="form-control" required>
                                                </div>

                                                <div class="mb-2 col-md-6">
                                                    <label for="zipcode">Email<span class="text-danger">*</span></label>
                                                    <input type="text" name="email"  value='{{ Auth::user()->email }}' class="form-control" required>
                                                </div>

                                                <div class="mb-2 col-md-6">
                                                    <label for="zipcode">Phone<span class="text-danger">*</span></label>
                                                    <input type="text" name="phone"  value='{{ Auth::user()->phone }}' class="form-control" required>
                                                </div>
                                                <div class="mb-2 col-md-6">
                                                    <label for="tietle">Title <span
                                                            class="text-danger">*</span></label>
                                                            <select type="text" name="title" class="form-control" required>
                                                            <option value="">Please select your Title</option>
                                                            <option value="Male">Mr.</option>
                                                            <option value="Female">Mrs.</option>
                                                            <option value="Female">Mr&Mrs.</option>
                                                            <option value="Female">Ms.</option>
                                                            <option value="Female">Miss.</option>
                                                    </select>
                                                </div>
                                            
                                                <div class="mb-2 col-md-6">
                                                    <label for="tietle">Gender <span
                                                            class="text-danger">*</span></label>
                                                            
                                                            <select required="" name="gender" class="form-control" id="gender">
                                                                <option value="">Please select your gender</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                                <option>Others</option>
                                                          </select> 
                                                </div>
                                                <div class="mb-2 col-md-6">
                                                    <label for="zipcode">Zipcode <span class="text-danger">*</span></label>
                                                    <input type="text" name="zipcode" class="form-control" required>
                                                </div>
                                                
                                                <div class="mb-2 col-md-6">
                                                    <label for="dob">Date of birth <span
                                                            class="text-danger">*</span></label>
                                                    <input type="date" name="dob" class="form-control"
                                                        data-toggle="date" placeholder="Select date" required>
                                                </div>
                                                <div class="pt-3 mt-3 col-12 border-bottom border-top">
                                                    <h5>Employment Information (Incase of Loan/Facility)</h5>
                                                   
                                                </div>
                                                <div class="mb-2 col-md-6">
                                                    <label for="phone_number">State Security Number(SSN, NI, SIN etc.) <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="statenumber" class="form-control" required>
                                                </div>


                                                <div class="mb-2 col-md-6">
                                                    <label for="tietle">Account Type <span
                                                            class="text-danger">*</span></label>
                                                            
                                                                <select required="" name="accounttype" value="{{ Auth::user()->accounttype }}" class="form-control" required>
                                                                    <option value="">Please select Account Type</option> 
                                                                   <option value="Checking Account">Checking Account</option>
                                                                   <option value="Savings Account">Saving Account</option>
                                                                   <option value="Fixed Deposit Account">Fixed Deposit Account</option>
                                                                   <option value="Current Account">Current Account</option>
                                                                   <option value="Crypto Currency Account">Crypto Currency Account</option>
                                                                   <option value="Business Account">Business Account</option>
                                                                   <option value="Non Resident Account">Non Resident Account</option>
                                                                   <option value="Cooperate Business Account">Cooperate Business Account</option>
                                                                   <option value="Investment Account">Investment Account</option>
                                                              
                                                    </select>
                                                </div>
                                                <div class="mb-2 col-md-6">
                                                    <label for="social_media">Type of Employment</label>
                                                    <select required name="employer" class="form-control" id="occupation">
                                                        <option value="">Select Type of Employment</option>
                                                           <option value="Self Employed">Self Employed</option>  
                                                           <option value="Self Employed">Public/Government Office</option>  
                                                           <option value="Self Employed">Private/Partnership Office</option>  
                                                           <option value="Self Employed">Business/Sales</option>  
                                                           <option value="Self Employed">Trading/Market</option>  
                                                           <option value="Self Employed">Military/Paramilitary</option>  
                                                           <option value="Self Employed">Politician/Celebrity</option>  
                                                           </select>
                                                   
                                                </div>


                                                <div class="mb-2 col-md-6">
                                                    <label for="income">Annual income Range</label>
                                                    <select required name="income" class="form-control" id="occupation">
                                                        <option value="">Select Salary Range</option>
                                                        <option value="$100.00 - $500.00">$100.00 - $500.00</option> 
                                                        <option value="$700.00 - $1,000.00">$700.00 - $1,000.00</option> 
                                                        <option value="$1,000.00 - $2,000.00">$1,000.00 - $2,000.00</option> 
                                                        <option value="$2,000.00 - $5,000.00">$2,000.00 - $5,000.00</option> 
                                                        <option value="$5,000.00 - $10,000.00">$5,000.00 - $10,000.00</option> 
                                                        <option value="$15,000.00 - $20,000.00">$15,000.00 - $20,000.00</option> 
                                                        <option value="$25,000.00 - $30,000.00">$25,000.00 - $30,000.00</option> 
                                                        <option value="$30,000.00 - $70,000.00">$30,000.00 - $70,000.00</option> 
                                                        <option value="$80,000.00 - $140,000.00">$80,000.00 - $140,000.00</option> 
                                                        <option value="$150,000.00 - $300,000.00">$150,000.00 - $300,000.00</option> 
                                                        <option value="$300,000.00 - $1,000,000.00">$300,000.00 - $1,000,000.00</option> 
                                                    </select>
                                                           </select>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pt-3 mt-3 col-12 border-bottom border-top">
                                            <h5>Your Address</h5>
                                            <p>Your simple location information required for identification</p>
                                        </div>
                                        <div class="mt-4 col-12">
                                            <div class="row">
                                                <div class="mb-2 col-md-6">
                                                    <label for="address">Address line<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="address" class="form-control" required>
                                                </div>
                                                <div class="mb-2 col-md-6">
                                                    <label for="city">City<span class="text-danger">*</span></label>
                                                    <input type="text" name="city" class="form-control" required>
                                                </div>
                                                <div class="mb-2 col-md-6">
                                                    <label for="state">State<span class="text-danger">*</span></label>
                                                    <input type="text" name="state" class="form-control" required>
                                                </div>
                                                <div class="mb-2 col-md-6">
                                                    <label for="country">Nationality <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" value ='{{ Auth::user()->country }}' name="country" class="form-control" required>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="pt-3 mt-3 col-12 border-bottom border-top">
                                            <h5>Registered Next of Kin</h5>
                                            
                                        </div>
                                        <div class="mt-4 col-12">
                                            <div class="row">
                                                <div class="mb-2 col-md-6">
                                                    <label for="address">Beneficiary Legal Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="kinname" class="form-control" required>
                                                </div>
                                                <div class="mb-2 col-md-6">
                                                    <label for="city">Next of kin Address<span class="text-danger">*</span></label>
                                                    <input type="text" name="kinaddress" class="form-control" required>
                                                </div>
                                                <div class="mb-2 col-md-6">
                                                    <label for="state">Relationship<span class="text-danger">*</span></label>
                                                    <input type="text" name="relationship" class="form-control" required>
                                                </div>
                                                <div class="mb-2 col-md-6">
                                                    <label for="country">age <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="age" class="form-control" required>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="pt-3 mt-3 col-12 border-bottom border-top">
                                            <h5>Document Upload</h5>
                                            <p>Your simple personal document required for identification</p>
                                        </div>
                                        <div class="mt-4 col-12">
                                            <div class="row">
                                                <div class="mb-2 col-md-12">
                                                    <div class="flex-wrap btn-group-toggle d-flex justify-content-around"
                                                        data-toggle="buttons">
                                                        <label class="mb-2 shadow-sm btn btn-primary active">
                                                            <i class="fas fa-atlas"></i>
                                                            <input type="radio" name="document_type"
                                                                value="Int'l Passport" autocomplete="off" checked> Int'l
                                                            Passport
                                                        </label>
                                                        <label class="mb-2 shadow-sm btn btn-primary">
                                                            <i class="fas fa-flag"></i>
                                                            <input type="radio" name="document_type" value="National ID"
                                                                autocomplete="off"> National ID
                                                        </label>
                                                        <label class="mb-2 shadow-sm btn btn-primary">
                                                            <i class="fas fa-address-card"></i>
                                                            <input type="radio" name="document_type"
                                                                value="Drivers License" autocomplete="off"> Drivers
                                                            License
                                                        </label>
                                                    </div>
                                                    <div class="mt-4">
                                                        <h6 class=" font-weight-bold">To avoid delays when verifying
                                                            account, Please make sure your document meets the criteria
                                                            below:</h6>
                                                        <ul class=" list-group">
                                                            <li>
                                                                <i class="fas fa-check-square text-primary"></i>
                                                                Chosen credential must not have expired.
                                                            </li>
                                                            <li>
                                                                <i class="fas fa-check-square text-primary"></i>
                                                                Document should be in good condition and clearly visible.
                                                            </li>
                                                            <li>
                                                                <i class="fas fa-check-square text-primary"></i>
                                                                Make sure that there is no light glare on the document.
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <p class="mt-3 text-black h6">Upload front side <span
                                                            class="text-danger">*</span></p>
                                                    <div class="mt-3 align-items-center justify-content-around d-md-flex">
                                                        <div class="p-2 border p-md-5 ">
                                                            <div class="custom-file">
                                                                <input type="file" name="frontimg"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <i class="fas fa-id-card fa-6x"></i>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <p class="mt-3 text-black h6">Upload back side <span
                                                            class="text-danger">*</span></p>
                                                    <div class="mt-3 align-items-center justify-content-around d-md-flex">
                                                        <div class="p-2 border p-md-5 ">
                                                            <div class="custom-file">
                                                                <input type="file" name="backimg" class="form-control"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <i class="fas fa-credit-card-blank fa-6x"></i>
                                                        </div>
                                                    </div>
                                                      <hr>
                                                    <p class="mt-3 text-black h6">Upload Passport Photograph <span
                                                            class="text-danger">*</span></p>
                                                    <div class="mt-3 align-items-center justify-content-around d-md-flex">
                                                        <div class="p-2 border p-md-5 ">
                                                            <div class="custom-file">
                                                                <input type="file" name="photo"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <i class="fas fa-user fa-6x"></i>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="mt-3 col-12">
                                            <div class="mb-2 form-check">
                                                <input  type="checkbox" value=""
                                                    id="defaultCheck1" required>
                                                <label class="form-check-label" for="defaultCheck1">
                                                    All The Information I Have Entered Is Correct.
                                                </label>
                                            </div> --}}
                                            @if (Auth::user()->account_verify == 'Under review')
                                                <button type="submit" class="px-4 btn btn-primary d-block"
                                                    disabled>Submit Application</button>
                                                <small class="text-success">Your previous application is under review,
                                                    please wait</small>
                                            @else
                                                <button type="submit" class="px-4 btn btn-primary">Submit
                                                    Application</button>
                                            @endif
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
@endsection
