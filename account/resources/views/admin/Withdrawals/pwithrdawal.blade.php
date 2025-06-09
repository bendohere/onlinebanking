<?php
if (Auth('admin')->User()->dashboard_style == 'light') {
    $text = 'dark';
    $bg = 'light';
} else {
    $text = 'light';
    $bg = 'dark';
}
?>
@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel ">
        <div class="content ">
            <div class="page-inner">
                <div class="mt-2 mb-5">
                    <h1 class="title1 d-inline ">Process Transfer Request</h1>
                    <div class="d-inline">
                        <div class="float-right btn-group">

                            <a class="btn btn-primary btn-sm" href="{{ route('mwithdrawals') }}"> <i
                                    class="fa fa-arrow-left"></i> back</a>
                        </div>
                    </div>
                </div>
                <x-danger-alert />
                <x-success-alert />
                <div class="mb-5 row">
                    <div class="col-lg-8 offset-lg-2 card p-md-4 p-2  shadow">
                        <div class="mb-3">
                            <div class="mb-3 form-group">
                                <h5 class="">Bank Name</h5>
                                <input type="text" class="form-control readonly  "
                                    value="{{ $withdrawal->bankname}}" readonly>
                            </div>
                            <div class="mb-3 form-group">
                                <h5 class="">Account Name</h5>
                                <input type="text" class="form-control readonly  "
                                    value="{{ $withdrawal->accountname }}" readonly>
                            </div>
                            <div class="mb-3 form-group">
                                <h5 class="">Account Number</h5>
                                <input type="text" class="form-control readonly  "
                                    value="{{ $withdrawal->accountnumber }}" readonly>
                            </div>


                            <div class="mb-3 form-group">
                                <h5 class="">Amount</h5>
                                <input type="text" class="form-control readonly  "
                                    value="{{ $settings->currency }}{{ $withdrawal->amount }}" readonly>
                            </div>
                            <div class="mb-3 form-group">
                                <h5 class="">Acount Type</h5>
                                <input type="text" class="form-control readonly  "
                                    value="{{ $withdrawal->Accounttype }}" readonly>
                            </div>

                            <div class="mb-3 form-group">
                                <h5 class="">Transfer Type</h5>
                                <input type="text" class="form-control readonly  "
                                    value="{{ $withdrawal->payment_mode }}" readonly>
                            </div>

                            <div class="mb-3 form-group">
                                <h5 class="">Description</h5>
                                <input type="text" class="form-control readonly  "
                                    value="{{ $withdrawal->Description }}" readonly>
                            </div>

                            <div class="mb-3 form-group">
                                <h5 class="">Bank Addresss</h5>
                                <input type="text" class="form-control readonly  "
                                    value="{{ $withdrawal->bankaddress }}" readonly>
                            </div>

                            <div class="mb-3 form-group">
                                <h5 class="">Country</h5>
                                <input type="text" class="form-control readonly  "
                                    value="{{ $withdrawal->country }}" readonly>
                            </div>
                        </div>

                        {{-- @if ($withdrawal->status != 'Processed') --}}
                            <div class="mt-1">
                                <form action="{{ route('pwithdrawal') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <h6 class="">Action</h6>
                                            <select name="action" id="action" class="  mb-2 form-control">
                                                {{-- <option selected disabled>Select processing action</option> --}}
                                                <option value="Paid">Paid</option>
                                                <option value="Reject">Reject</option>
                                                <option value="On-hold">On-hold</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <h6 class="">Date</h6>
                                            <input name="date"  type='datetime-local' id="action" class="  mb-2 form-control">
                                                
                                            
                                        </div>
                                    </div>
                                    <div class="form-row d-none" id="emailcheck">
                                        <div class="col-md-12 form-group">
                                            <div class="selectgroup">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="emailsend" id="dontsend" value="false"
                                                        class="selectgroup-input" checked="">
                                                    <span class="selectgroup-button">Don't Send Email</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="emailsend" id="sendemail" value="true"
                                                        class="selectgroup-input">
                                                    <span class="selectgroup-button">Send Email</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row d-none" id="emailtext">
                                        <div class="form-group col-md-12">
                                            <h6 class="">Subject</h6>
                                            <input type="text" name="subject" id="subject" class="  form-control">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <h6 class="">Enter Reasons for rejecting this withdrawal request</h6>
                                            <textarea class="  form-control" row="3" placeholder="Type in here" name="reason" id="message"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="id" value="{{ $withdrawal->id }}">
                                        <input type="submit" class="px-3 btn btn-primary" value="Proccess">
                                    </div>
                                </form>
                            </div>
                        {{-- @endif --}}
                    </div>
                </div>
            </div>
        </div>

        <script>
            let action = document.getElementById('action3');

            $('#action').change(function() {
                if (action.value === "Reject") {
                    document.getElementById('emailcheck').classList.remove('d-none');
                } else {
                    document.getElementById('emailcheck').classList.add('d-none');
                    document.getElementById('emailtext').classList.add('d-none');
                    document.getElementById('dontsend').checked = true;
                    document.getElementById('subject').removeAttribute('required');
                    document.getElementById('message').removeAttribute('required');
                }
            });

            $('#sendemail').click(function() {
                document.getElementById('emailtext').classList.remove('d-none');
                document.getElementById('subject').setAttribute('required', '');
                document.getElementById('message').setAttribute('required', '');
            });

            $('#dontsend').click(function() {
                document.getElementById('emailtext').classList.add('d-none');
                document.getElementById('subject').removeAttribute('required');
                document.getElementById('message').removeAttribute('required');
            });
        </script>
    @endsection
