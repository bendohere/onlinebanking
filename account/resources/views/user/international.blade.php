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
    <form class="form w-100" action="{{ route('internationaltransfer') }}"  method="post">
        @csrf
            <h3 class="text-dark mb-3"> International Wire Transfer</h3>
        </div>
        <div>
            <p>Funds will reflect in the Beneficiary Account within 72hours.</p>
        </div>
        <div class="fv-row mb-6">
            <div class="input-group mb-3">
                <span class="input-group-text border-0 fs-2">{{ $settings->currency }}</span>
                                <input class="form-control form-control-lg form-control-solid fs-2 fw-bold " type="number" step="any" name="amount" autocomplete="transaction-amount" id="amount" min="1" max="{{ number_format(Auth::user()->account_bal, 2, '.', ',') }}" value="" required placeholder="0.00" />
                                <span class="input-group-text border-0"><i class="fal fa-money" aria-hidden="true"></i></span>
            </div>
                    </div>
                    <div class="fv-row mb-5 form-floating">
                        <input class="form-control form-control-lg form-control-solid fs-2 " id="accountname" type="text" name="accountname" autocomplete="accountname" value="" required />
                        <label class="form-label fs-6 fw-bolder text-dark" for="accountname">Beneficiary Account Name</label>
                    </div>
        <div class="fv-row mb-5 form-floating">
                        <input class="form-control form-control-lg form-control-solid fs-2 " id="name" type="text" name="accountnumber" autocomplete="accountnumber" value="" required />
                        <label class="form-label fs-6 fw-bolder text-dark" for="accountnumber">Beneficiary Account Number</label>
                    </div>

                    <div class="fv-row mb-5 form-floating">
                        <input class="form-control form-control-lg form-control-solid fs-2 " id="bankname" type="text" name="bankname" autocomplete="bankname" value="" required />
                        <label class="form-label fs-6 fw-bolder text-dark" for="bankname">Bank name</label>
                    </div>

                    <div class="fv-row mb-5 form-floating">
                        <input class="form-control form-control-lg form-control-solid fs-2 " id="bankaddress" type="text" name="bankaddress" autocomplete="bankaddress" value="" required />
                        <label class="form-label fs-6 fw-bolder text-dark" for="bankaddress">Bank Address</label>
                    </div>
             

                    <div class="fv-row mb-5 form-floating">
                       
                        <select class="form-control form-control-lg form-control-solid fs-2 "  type="text" name ='Accounttype' autocomplete="Accounttype" value="" readonly required />
                                                        <option value="Online Banking">Online Banking</option>
                                                         <option value="Joint Account">Joint Account</option>
                                                         <option value="Checking">Checking</option>
                                                         <option value="Savings Account">Savings Account</option>
                    </select>
                    <label class="form-label fs-6 fw-bolder text-dark" for="country">Account Type</label>
                    </div>

                    <div class="fv-row mb-5 form-floating">
                       
                        <select class="form-control form-control-lg form-control-solid fs-2 "  type="text" name ='country' autocomplete="country" value="" readonly required />
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antarctica">Antarctica</option>
                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Bouvet Island">Bouvet Island</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Christmas Island">Christmas Island</option>
                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Croatia (Hrvatska)">Croatia (Hrvatska)</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="East Timor">East Timor</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="France, Metropolitan">France, Metropolitan</option>
                        <option value="French Guiana">French Guiana</option>
                        <option value="French Polynesia">French Polynesia</option>
                        <option value="French Southern Territories">French Southern Territories</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Guernsey">Guernsey</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Heard and Mc Donald Islands">Heard and Mc Donald Islands</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="India">India</option>
                        <option value="Isle of Man">Isle of Man</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Iran (Islamic Republic of)">Iran (Islamic Republic of)</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Ivory Coast">Ivory Coast</option>
                        <option value="Jersey">Jersey</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Korea, Democratic People&#039;s Republic of">Korea, Democratic People&#039;s Republic of</option>
                        <option value="Korea, Republic of">Korea, Republic of</option>
                        <option value="Kosovo">Kosovo</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Lao People&#039;s Democratic Republic">Lao People&#039;s Democratic Republic</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macau">Macau</option>
                        <option value="Macedonia">Macedonia</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montenegro">Montenegro</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Namibia">Namibia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                        <option value="New Caledonia">New Caledonia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk Island">Norfolk Island</option>
                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau">Palau</option>
                        <option value="Palestine">Palestine</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Pitcairn">Pitcairn</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Reunion">Reunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Russian Federation">Russian Federation</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                        <option value="Saint Lucia">Saint Lucia</option>
                        <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                        <option value="Samoa">Samoa</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Serbia">Serbia</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="South Georgia South Sandwich Islands">South Georgia South Sandwich Islands</option>
                        <option value="South Sudan">South Sudan</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="St. Helena">St. Helena</option>
                        <option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                        <option value="United States minor outlying islands">United States minor outlying islands</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Vatican City State">Vatican City State</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Vietnam">Vietnam</option>
                        <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                        <option value="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
                        <option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
                        <option value="Western Sahara">Western Sahara</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zaire">Zaire</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                    </select>
                    <label class="form-label fs-6 fw-bolder text-dark" for="country">Country</label>
                    </div>
                    <div class="fv-row mb-5 form-floating">
                        <input class="form-control form-control-lg form-control-solid fs-2 " id="swiftcode" type="text" name="swiftcode" autocomplete="swiftcode" value="" />
                        <label class="form-label fs-6 fw-bolder text-dark" for="swiftcode">Swift Code is required.</label>
                    </div>
                    <div class="fv-row mb-5 form-floating">
                        <input class="form-control form-control-lg form-control-solid fs-2 " id="iban" type="text" name="iban" autocomplete="iban" value="" required />
                        <label class="form-label fs-6 fw-bolder text-dark" for="iban">IBAN Number is required.</label>
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
  
 