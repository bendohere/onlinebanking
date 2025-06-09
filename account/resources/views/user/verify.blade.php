
@extends('layouts.guest2')
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
    <x-danger-alert/>
	<x-success-alert/>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-5 row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="p-3 text-center">
                                 @if (Auth::user()->account_verify == 'Verified' or Auth::user()->account_verify == 'Under review') 
                                 <p></p>
                                @else
                                
                                <h3 style="font-weight:700; color:Purple;">{{$settings->site_name}}</h3>
                                <h6>Dear {{Auth::user()->name}}  {{Auth::user()->lastname}}  {{Auth::user()->middlename}},
Welcome aboard! {{$settings->site_name}} is the market most innovative and fastest-growing company in the financial industry. We look forward to working with you, to help you get the most out of our financial services and realize your banking goals.

Here at {{$settings->site_name}}, we are committed in providing wide variety of savings, investment and loan products, all designed to meet your specific needs. Our services are being used by over two million customers around the world. We hope that we’ll live up to your expectations.
Our excellent customer support team is available 24/7 to help you with any questions. You can contact them at:
{{$settings->contact_email}}.

Your satisfaction is a priority for us, so feel free to share any feedback you have – we take your opinion seriously and will do our best to implement solutions for you.

We need a little more information to complete your registration, including completing AML/KYC form </h6>
                                @endif
                            </div>
                            <div class="p-2 text-center shadow-lg p-md-5">
                                @if ( Auth::user()->account_verify == 'Under review') 
                                
                               <h1 class='text-warning'>Account Under Review</h1> 
<h4>Hi {{Auth::user()->name}} {{Auth::user()->lastname}}, Your {{$settings->site_name}} internet banking account is currently inactive. Kindly contact our online customer care representative.</h4>
                                @else
                                
                                 <h3 style="font-weight:700; color:Purple;">TERMS AND CONDITIONS</h3>
		<div class="row">
            <div class="col-lg-12">
                             
                                 


 
 <textarea name="terms" rows="12" readonly="readonly" cols="55" style="width:100%;" autocomplete="off">
Before you can start using our online service you must agree to be bound by the conditions below.  You must read the conditions before you 
decide whether to accept them.  If you agree to be bound by these conditions, please click the I accept button below.  If you click on the
Decline button, you will not be able to continue your registration for our online services. We strongly recommend that you print a copy of 
these conditions for your reference.

1. DEFINITIONS.
In these conditions the following words have the following meanings.

- ACCOUNT:  any account which you hold and access via our online service.

- ADDITIONAL SECURITY DETAILS:  the additional information you give us to
help us identify you including the additional security question you 
provide yourself.

- IDENTITY DETAILS:  the access code we may provide you with.

- {{ $settings->site_name }} ACCOUNT NUMBER, PASSWORD and ACCOUNT PIN   you choose to identify 
yourself when you use our online service.


- YOU, YOUR and YOURSELF  refer to the person who has entered into this 
agreement with us.

2. USING THE ONLINE SERVICE.

a. These conditions apply to your use of our online service and in relation to any accounts.  They explain the relationship between you and
us in relation to our online service.  You should read these conditions carefully to understand how these services work and your and our rights
and duties under them.  If there is a conflict between these conditions and your account conditions, these conditions will apply.  This means 
that, when you use our online service both sets of conditions will apply unless they contradict each other in which case, the relevant condition
in these conditions apply.

b. If any of your accounts is a joint account, these conditions apply to all of you together and any of you separately.  If more than one of you
uses our online service you must each choose your own username, password and additional security details.

c. By registering to use our online service, you accept these conditions and agree that we may communicate with you by e-mail or through our website.

d. When you use our online service you must follow the instructions we give you from time to time.  You are responsible for ensuring that your 
computer, software and other equipment are capable of being used with our online service.

e. Our online sites are secure.  Disconnection from the Internet or leaving these sites will not automatically log you off.  You must always
use the log off facility when you are finished and never leave your machine unattended while you are logged in.  As a security measure, if 
you have not used the sites for more than a specified period of time we will ask you to log in again. 

3. WHAT RULES APPLY TO SECURITY?

a. As part of the registration for our online service you must provide us with identity details before we will allow you to use the services 
for the first time.  You must enter your identity details immediately after signing in, so we can identify you.

b. Every time you use our online service you must give us your username, your password and the answer to an additional security question.

c. You can change your username or password online by following the instructions on the screen.  

d. For administration or security reasons, we can require you to choose a new username or change your password before you use (or carry on using)
our online service.

e. You must not write down, store (whether encrypted or otherwise) on your computer or let anyone else know your password, identity details or
additional security details, and the fact that they are for use with your accounts.

f. If you think that someone else knows your password or any of your additional security details or has used any of them to use our online 
service, you must do the following:

- For your password, change it online as soon as possible.  If you have difficulty changing your password, you must phone us on +1 234 567 8910
immediately.  You can give us your username if you phone to change your password.

- For your additional security details, you will need to phone us immediately to change your additional security details.

g. We may give the police or any prosecuting authority any information they need if we think it will help them find out if someone else is 
using your username, password or any of your additional security details.

h. We may also keep any e-mails sent to or from us.  We do this to check what was written and also to help train our staff.

i. If we think that:

- someone else is trying to use our service for your accounts;

- the wrong username, password or any of your additional security 
details have has been used for your account;

- you or someone else is using our online service illegally;

- you are not keeping to these conditions or the conditions of any of 
your accounts; or 

- your username, password  or any of your additional security details 
might be known or used by someone else,

we can stop you (or someone else) using our online service.  We will tell you as soon as possible if we do this.

j. We may require you to provide one or more of the additional security details and/or enter your password again before we accept instructions 
about your account.

k. You must not tell anyone your password or additional security details.  You can give the Helpdesk your username if you need help to 
change your password or need to report that someone else knows your password, username or additional security details.

l. For your protection, we occasionally check requests to move or transfer money. Therefore, some transactions may be subject to a delay 
of up to 24 hours whilst these checks are carried out.

4. WHAT IS THE EXTENT OF YOUR LIABILITY?

a. If you are a victim of online fraud, we guarantee that you wont lose any money on your accounts and will always be reimbursed in full.

b. Unless you are a victim of fraud you are responsible for all instructions and other information sent using your username, password or
additional security details.

c. You will not be held responsible for any instructions or information sent after you have told us that someone knows your password or 
additional security details and has used any of them to access our online service.

d. {{$settings->site_name}} do not accept responsibility for any loss you or anybody else may suffer because any instructions or information you sent us are sent in 
error, fail to reach us or are distorted unless you have been the victim of fraud.

e. {{$settings->site_name}} do not accept responsibility for any loss you or anybody else may suffer because any instructions or information we send you fail to reach
you or are distorted unless you have been the victim of fraud.

5. HOW WE CAN CHANGE THESE CONDITIONS

a. {{$settings->site_name}} change these conditions for any reason by giving you written notice or publishing the change on our website.

b. We may send all written notices to you at the last e-mail address you gave us.  You must let us know immediately if you change your e-mail 
address (you can do so online), to make sure that we have your current e-mail address at all times.

6. GENERAL

{{$settings->site_name}} service is available to you if you are 18 years of age or over.
</textarea>
                        </div>
            
            
            
        </div>
    @endif               
                                @if (Auth::user()->account_verify == 'Verified' or Auth::user()->account_verify == 'Under review')
                                    <!--<button class="mt-2 btn btn-primary btn-sm" disabled>Click here to complete your KYC</button> <br>-->
                                    <small class="text-success">Your previous application is under review, please wait</small>
                                @else
                                <div>
                                
                                    <a href="{{ route('kycform') }}" class="mt-2 btn btn-primary btn-sm">Click here to complete your AML </a>

                                </div>
                                <div>
                                
                                    <a href="{{ route('logout') }}" class="mt-2 btn btn-danger btn-sm"  onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Decline 
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </a>

                                </div>
                                @endif
                            </div>
                            <div class="p-2 mt-5 shadow-lg d-md-flex justify-content-between">
                                <div class="p-2">
                                    <i class="p-4 fas fa-envelope-open-text fa-4x bg-light rounded-pill"></i>
                                </div>
                                <div class="p-2">
                                    <h4>We’re here to help you!</h4>
                                    <p>Ask a question, manage request, report an issue. Our support team will get back to you by email.</p>
                                </div>
                                <div class="p-md-4">
                                    <a href="{{ route('support') }}" class="px-3 btn btn-outline-primary btn-sm">Get Support Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
@endsection
