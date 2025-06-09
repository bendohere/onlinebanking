<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;
use App\Models\User_plans;
use App\Models\Wdmethod;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Auth;
use App\Mail\NewNotification;
use Illuminate\Support\Facades\Mail;
use App\Mail\WithdrawalStatus;
use App\Traits\Coinpayment;
use Carbon\Carbon;
use Session;
use Twilio\Rest\Client;

class WithdrawalController extends Controller
{
    use Coinpayment;
    //
    public function withdrawamount(Request $request)
    {
        
        return redirect()->route('withdrawfunds');
    }


    public function loan(Request $request)
    {
        
        return redirect()->route('dashboard')
            ->with('success', 'Action Sucessful! Please wait while we process your loan request.');
    }


    //Return withdrawals route
    public function withdrawfunds()
    {
        $paymethod = session('paymentmethod');
        $checkmethod =  Wdmethod::where('name', $paymethod)->first();
        if ($checkmethod->defaultpay == "yes") {
            $default = true;
        } else {
            $default = false;
        }

        if ($checkmethod->methodtype == "crypto") {
            $methodtype = 'crypto';
        } else {
            $methodtype = 'currency';
        }

        return view('user.withdraw', [
            'title' => 'Complete Withdrawal Request',
            'payment_mode' => $paymethod,
            'default' => $default,
            'methodtype' => $methodtype,
        ]);
    }

    public function getotp()
    {
        
    if(auth::user()->transferaction==1){
       return back();
    }
        $code = $this->RandomStringGenerator(6);

        $user = Auth::user();
        User::where('id', $user->id)->update([
            'withdrawotp' => $code,
        ]);
        $settings = Settings::where('id', '1')->first();

        $message = "You recently initiated  transfer from your $settings->site_name  $user->accounttype via our online banking channel.\n
        If this was legitimate activity from you and were expecting this email, consider using the code below to complete your transaction:\n
                                                 $code
           
        \nIf you do not use $settings->site_name or did not attempted to carry out a transaction via your $settings->site_name internet banking channel, please ignore this email or contact support if you have questions.";
        $subject = "Comfirm transction";
        // Mail::bcc($user->email)->send(new NewNotification($message, $subject, $user->name));
        
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: '.$settings->site_name.'<'.$settings->contact_email.'>' . "\r\n";
        mail($user->email, $subject, $message, $headers);
        
         return redirect()->route('otpview');

         
    }
    
    
    function otpview(){
         return view('user.otp')->with('success', 'Action Sucessful! OTP have been sent to your email');
    }


    public function completewithdrawal(Request $request)
    {

        if (Auth::user()->sendotpemail == "Yes") {
            if ($request->otpcode != Auth::user()->withdrawotp) {
                return redirect()->back()->with('message', 'OTP is incorrect, please recheck the code');
            }
        }

        $settings = Settings::where('id', '1')->first();
        if ($settings->enable_kyc == "yes") {
            if (Auth::user()->account_verify != "Verified") {
                return redirect()->back()->with('message', 'Your account must be verified before you can make withdrawal.');
            }
        }

        $method = Wdmethod::where('name', $request->method)->first();
        if ($method->charges_type == 'percentage') {
            $charges = $request['amount'] * $method->charges_amount / 100;
        } else {
            $charges = $method->charges_amount;
        }

        $to_withdraw = $request['amount'] + $charges;
        //return if amount is lesser than method minimum withdrawal amount

        if (Auth::user()->account_bal < $to_withdraw) {
            return redirect()->back()
                ->with('message', 'Sorry, your account balance is insufficient for this request.');
        }

        if ($request['amount'] < $method->minimum) {
            return redirect()->back()
                ->with("message", "Sorry, The minimum amount you can withdraw is $settings->currency$method->minimum, please try another payment method.");
        }

        //get user last investment package
        User_plans::where('user', Auth::user()->id)
            ->where('active', 'yes')
            ->orderBy('activated_at', 'asc')->first();

        //get user
        $user = User::where('id', Auth::user()->id)->first();

        if ($request->method == 'Bitcoin') {
            if (empty($user->btc_address)) {
                return redirect()->route('profile')
                    ->with('message', 'Please Setup your Bitcoin Wallet Address');
            }
            $coin = "BTC";
            $wallet = $user->btc_address;
        } elseif ($request->method  == 'Ethereum') {
            if (empty($user->eth_address)) {
                return redirect()->route('profile')
                    ->with('message', 'Please Setup your Ethereum Wallet Address');
            }
            $coin = "ETH";
            $wallet = $user->eth_address;
        } elseif ($request->method  == 'Litecoin') {
            if (empty($user->ltc_address)) {
                return redirect()->route('profile')
                    ->with('message', 'Please Setup your Litecoin Wallet Address');
            }
            $coin = "LTC";
            $wallet = $user->ltc_address;
        } elseif ($request->method  == 'USDT') {
            if (empty($user->usdt_address)) {
                return redirect()->route('profile')
                    ->with('message', 'Please Setup your USDT Wallet Address');
            }
            $coin = "USDT.TRC20";
            $wallet = $user->usdt_address;
        } elseif ($request->method  == 'Bank Transfer') {
            if (empty($user->account_name) or empty($user->bank_name) or empty($user->account_number)) {
                return redirect()->route('profile')
                    ->with('message', 'Please Setup your Bank Account Details');
            }
        }

        $amount = $request['amount'];
        $ui = $user->id;


   if ($settings->withdrawal_option == "auto" and ($request->method == 'Bitcoin' or $request->method  == 'Litecoin' or $request->method  == 'Ethereum' or $request->method == 'USDT')) {
            return $this->cpwithdraw($amount, $coin, $wallet, $ui, $to_withdraw);
        }
    
            //debit user
            User::where('id', $user->id)->update([
                'account_bal' => $user->account_bal - $to_withdraw,
                'withdrawotp' => NULL,
            ]);

        //save withdrawal info
        $dp = new Withdrawal();
        $dp->amount = $amount;
        $dp->to_deduct = $to_withdraw;
        $dp->payment_mode = $request->method;
        $dp->status = 'Pending';
        $dp->paydetails = $request->details;
        $dp->user = $user->id;
        $dp->save();

        // send mail to admin
        Mail::to($settings->contact_email)->send(new WithdrawalStatus($dp, $user, 'Withdrawal Request', true));

        //send notification to user
        Mail::to($user->email)->send(new WithdrawalStatus($dp, $user, 'Successful Withdrawal Request'));

        return redirect()->route('withdrawalsdeposits')
            ->with('success', 'Action Sucessful! Please wait while we process your request.');
    }

    public function localtransfer(Request $request)
    {
        
        $user = User::where('id', Auth::user()->id)->first();
        
        $settings = Settings::where('id', '1')->first();
        //check if transction pin is on
        if($user->allowtransfer =='1'){
            return redirect()->back()
          ->with("message", "Sorry, your account is dormant. Contact support on $setting->contact_email for more details.");
          }
            //check if transaction pin match
          if($user->pin != $request->pin){
            return redirect()->back()
          ->with("message", "Sorry, incorrect transaction pin");
          }
        if (Auth::user()->account_bal < $request['amount']) {
            return redirect()->back()
                ->with('message', 'Sorry, your account balance is insufficient for this request.');
        }
        
        
         $subtxn =substr(strtoupper($settings->site_name),0,4);
              $codetxn1 = $this->RandomStringGenerator(8);
              $codetxn2 = substr(strtoupper(Carbon::now()),0,4);
              //grabing evereything submitted by user and put it in session
                     $data['bankname'] = $request->bankname;
                     $data['amount'] = $request->amount;
                     $data['accountname'] = $request->accountname;
                     $data['bankname'] = $request->bankname;
                     $data['accountnumber'] = $request->accountnumber;
                     $data['Accounttype'] = $request->Accounttype;
                     $data['Description'] = $request->Description;
                     $data['user'] = $user->id;
                     $data['payment_mode'] = "Domestic Transfer";
                     $data['date'] = Carbon::now();
                     $data['txn_id'] ="$subtxn/$codetxn1-$codetxn2";
                     Session::put('data', $data);
       
      //assignin/turn off transanction number 
     if(Auth::user()->transferaction=='1'){
        User::where('id', $user->id)->update([
            'transferaction' => 0,
            
        ]);
     }
 
 
       
        // Session::put('data', $data);
        
        if($settings->otp ==1){
            return redirect()->route('getotp','data');

        }
       
      
        sleep(3);
        return redirect()->route('previewtransfer','data');

    }



// international transfer
    public function internationaltransfer (Request $request)
    {
        $this->validate($request, [
            
            'accountname' => 'required',
            'accountnumber' => 'required',
            'amount' => 'required|numeric',
            'bankname'=> 'required',
        ]);

       
          $user = User::where('id', Auth::user()->id)->first();
          $settings = Settings::where('id', '1')->first();
          //check if transfer is allowed
          if($user->allowtransfer =='1'){
            return redirect()->back()
          ->with("message", "Sorry, your account is dormant. Contact support on $setting->contact_email for more details.");
          }
        
          //check if transaction pin match
          if($user->pin != $request->pin){
            return redirect()->back()
          ->with("message", "Sorry, incorrect transaction pin");
          }

          if ($request->amount < 1) {
            return redirect()->back()
          ->with("message", "Sorry, The minimum amount you can transfer is $settings->currency 1, please Enter correct amount .");
        }
          
        if (Auth::user()->account_bal < $request->amount) {
            return redirect()->back()
                ->with('message', 'Sorry, your account balance is insufficient for this request.');
        }
        //assignin/turn off transanction number 
         if(Auth::user()->transferaction=='1'){
            User::where('id', $user->id)->update([
                'transferaction' => 0,
                
            ]);
         }
              $subtxn =substr(strtoupper($settings->site_name),0,4);
              $codetxn1 = $this->RandomStringGenerator(8);
              $codetxn2 = substr(strtoupper(Carbon::now()),0,4);
              //grabing evereything submitted by user and put it in session
                     $data['bankname'] = $request->bankname;
                     $data['country'] = $request->country;
                     $data['amount'] = $request->amount;
                     $data['accountname'] = $request->accountname;
                     $data['bankname'] = $request->bankname;
                     $data['accountnumber'] = $request->accountnumber;
                     $data['Accounttype'] = $request->Accounttype;
                     $data['Description'] = $request->Description;
                     $data['iban'] = $request->iban;
                     $data['bankaddress'] = $request->bankaddress;
                     $data['swiftcode'] = $request->swiftcode;
                     $data['user'] = $user->id;
                     $data['payment_mode'] = "International Wire Transfer";
                     $data['date'] = Carbon::now();
                     $data['txn_id'] ="$subtxn/$codetxn1-$codetxn2";
                     Session::put('data', $data);
					 
					 
	if($settings->code1status == 1){
	return redirect()->route('code1verification');
    }
    
    	if($settings->code2status == 1){
     	return redirect()->route('verificationcode2');
       }
       
       	if($settings->code1status == 3){
        	return redirect()->route('verification3code');
        }
    if($settings->otp ==1){
        return redirect()->route('getotp');

    }

    return redirect()->route('previewtransfer');

}

//codecomfirm 
    function codecomfirm(Request $request){
        
        $user = User::where('id', Auth::user()->id)->first();
        $settings = Settings::where('id', '1')->first();
        $data = Session::get('data');
        // dd(Auth::user()->code1, $request->code);
        //code1 request
     if($request->code1){
        $this->validate($request, [
            
            'code1' => 'required',
           
        ]);
         if (Auth::user()->code1 != $request->code1){
         return redirect()->back()
                ->with("message", "Sorry, Invalid $settings->code1 code!!! contact support on $settings->contact_email for the appropriate $settings->code1 for this transaction  ");
         }
         
         	if($settings->code2status == 1){
         	    sleep(3);
     	return redirect()->route('verificationcode2');
       }
       
       	if($settings->code3status == 1){
       	    sleep(3);
     	return redirect()->route('verification3code');
       }
         
         if($settings->otp ==1){
             sleep(3);
        return redirect()->route('getotp');

    }
    
     }


// checkin if code2

if($request->code2){
       $this->validate($request, [
            
            'code2' => 'required',
           
        ]);
       
         if (Auth::user()->code2 != $request->code2){
         return redirect()->back()
                ->with("message", "Sorry, Invalid $settings->code2 code!!! contact support on $settings->contact_email for the appropriate $settings->code2 for this transaction  ");
         }
         
         
       
       	if($settings->code3status == 1){
       	    sleep(3);
     	return redirect()->route('verification3code');
       }
         
         if($settings->otp ==1){
             sleep(3);
        return redirect()->route('getotp');

    }
    
    
}


if($request->code3){
    
    $this->validate($request, [
            
            'code3' => 'required',
           
        ]);
       
         if (Auth::user()->code3 != $request->code3){
         return redirect()->back()
                ->with("message", "Sorry, Invalid $settings->code3 code!!! contact support on $settings->contact_email for the appropriate $settings->code3 for this transaction  ");
         }
         
         
       
       
         if($settings->otp ==1){
             sleep(3);
        return redirect()->route('getotp');

    }
    
 }


     //otp request
    
    if($request->otp){
        
       $this->validate($request, [
            
            'otp' => 'required',
           
        ]);
       
         if (Auth::user()->withdrawotp != $request->otp){
             
             
         return redirect()->back()
                ->with("message", "Sorry, Invalid OTP code!!!  ");
                
         }
         
         
         
     }

    sleep(3);
    
     return redirect()->route('previewtransfer');

    }


    //  International preview international transfer

    public function previewtransfer(Request $request)
    {

     ///catch session
            $data = Session::get('data');
        $settings = Settings::where('id', '1')->first();

       
        $user = User::where('id', Auth::user()->id)->first();
        $balance = $user->account_bal - $data['amount'];
        $to_withdraw = $data['amount'] ;
       
        // // check if transferction is on
        if (Auth::user()->transferaction=='1') {
            return redirect()->route('dashboard')
                ->with('success', 'Transaction was Successful.');
        }
       
    
        if ($user->account_bal < $data['amount']) {
            return redirect()->back()
                ->with("message", "Sorry, Your balance is low for this transaction.");
        }
     
            
            if($data['payment_mode'] == 'International Wire Transfer'){
            //debit user
            User::where('id', $user->id)->update([
                'account_bal' => $user->account_bal - $data['amount'],
                'withdrawotp' => NULL,
            ]);
      

        //save withdrawal info
        $dp = new Withdrawal();
        $dp->amount = $data['amount'];
        $dp->to_deduct = $to_withdraw;
        $dp->payment_mode = 'International Wire Transfer';
        $dp->status = 'Pending';
        $dp->accountname = $data['accountname'];
        $dp->accountnumber = $data['accountnumber'];
        $dp->bankname = $data['bankname'];
        $dp->Accounttype = $data['Accounttype'];
        $dp->Description = $data['Description'];
        $dp->bankaddress = $data['bankaddress'];
        $dp->country = $data['country'];
        $dp->swiftcode = $data['swiftcode'];
        $dp->iban = $data['iban'];
        $dp->date = Carbon::now();
        $dp->paydetails = $data['details'];
        $dp->txn_id = $data['txn_id'];
        $dp->user = $user->id;
        $dp->bal =  $balance;
        $dp->save();
        
        
        $code = $dp->txn_id;
        $data = $dp;

        // send mail to admin
        Mail::to($settings->contact_email)->send(new WithdrawalStatus($dp, $user, 'Transfer Request', true));

        // //send notification to user
        // Mail::to($user->email)->send(new WithdrawalStatus($dp, $user, 'Successful Transfer Request'));
        
            $message = "Your transfer request of $settings->currency$dp->amount to $dp->accountname, $dp->bankname has been confirmed and beneficiary is expected to be credited soon
            \n Details of the transaction are shown below;  
         \nAccount Number: $dp->accountnumber
         \nAccount Name:$dp->accountname
         \nDescription: $dp->Description
         \nTotal Amount: $settings->currency$dp->amount
         \nDate:$date
         \nAvailable Balance:$settings->currency$dp->bal";
        
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: '.$settings->site_name.'<'.$settings->contact_email.'>' . "\r\n";
        mail($user->email,'Successful Transfer Request', $message, $headers);


        $date  = Carbon::parse($dp->created_at)->toDayDateTimeString();
        if($settings->sms=='1'){
            $receiverNumber = $user->phone;
        $message = "Your transfer request of $settings->currency$dp->amount to $dp->accountname, $dp->bankname has been confirmed and beneficiary is expected to be credited soon
        \n Details of the transaction are shown below;  
     \nAccount Number: $dp->accountnumber
     \nAccount Name:$dp->accountname
     \nDescription: $dp->Description
     \nTotal Amount: $settings->currency$dp->amount
     \nDate:$date
     \nAvailable Balance:$settings->currency$dp->bal";
  
        try {
  
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");
  
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number, 
                'body' => $message]);
  
          
  
        } catch (Exception $e) {
            
        }

        }
            }
            
            else{
                
                
       User::where('id', $user->id)->update([
        'account_bal' => $user->account_bal - $data['amount'],
        'withdrawotp' => NULL,
    ]);
       

      $subtxn =substr(strtoupper($settings->site_name),0,4);
        $codetxn1 = $this->RandomStringGenerator(8);
        $codetxn2 = substr(strtoupper(Carbon::now()),0,4);
        //save withdrawal info
        $dp = new Withdrawal();
        $dp->amount =  $data['amount'];
        $dp->to_deduct = $data['amount'];
        $dp->payment_mode = 'Local Transfer';
        $dp->status = 'Pending';
        $dp->accountname = $data['accountname'];
        $dp->accountnumber = $data['accountnumber'];
        $dp->bankname = $data['bankname'];
        $dp->type = 'Debit';
        $dp->Accounttype = $data['Accounttype'];
        $dp->Description = $data['Description'];
        $dp->paydetails = $data['details'];
        $dp->date = Carbon::now();
        $dp->user = $user->id;
        $dp->txn_id = "$subtxn/$codetxn1-$codetxn2";
        $dp->bal =  $balance;
        $dp->save();
        
        $code = $dp->txn_id;
    
        
          // send mail to admin
        Mail::to($settings->contact_email)->send(new WithdrawalStatus($dp, $user, 'Withdrawal Request', true));

        //send notification to user
        // Mail::to($user->email)->send(new WithdrawalStatus($dp, $user, 'Successful Local Transfer Request'));
        
        $message = "Your transfer request of $settings->currency$dp->amount to $dp->accountname, $dp->bankname has been confirmed and beneficiary is expected to be credited soon
        \nDetails of the transaction are shown below;
     \nAccount Number: $dp->accountnumber
     \nAccount Name:$dp->accountname
     \nDescription: $dp->Description
     \nTotal Amount: $settings->currency$dp->amount
     \nDate:$date
     \nAvailable Balance:$settings->currency$dp->bal";  
                
        
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: '.$settings->site_name.'<'.$settings->contact_email.'>' . "\r\n";
        mail($user->email, 'Successful Local Transfer Request', $message, $headers);
        
        
    
    //sms

    $date  = Carbon::parse($dp->created_at)->toDayDateTimeString();
        if($settings->sms=='1'){
            $receiverNumber = $user->phone;
        $message = "Your transfer request of $settings->currency$dp->amount to $dp->accountname, $dp->bankname has been confirmed and beneficiary is expected to be credited soon
        \nDetails of the transaction are shown below;
     \nAccount Number: $dp->accountnumber
     \nAccount Name:$dp->accountname
     \nDescription: $dp->Description
     \nTotal Amount: $settings->currency$dp->amount
     \nDate:$date
     \nAvailable Balance:$settings->currency$dp->bal";
  
        try {
  
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");
  
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number, 
                'body' => $message]);
  
          
  
        } catch (Exception $e) {
            
        }

        }
        
                
                
            }
       
        //turn on transfer action
            User::where('id', $user->id)->update([
                'transferaction' => 1,
                
            ]);
          
            sleep(2);
            
        return view('user.preview',compact('settings', 'dp','code'));
    }


    // for front end content management
    function RandomStringGenerator($n)
    {
        $generated_string = "";
        $domain = "ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $len = strlen($domain);
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, $len - 1);
            $generated_string = $generated_string . $domain[$index];
        }
        // Return the random generated string 
        return $generated_string;
    }
}