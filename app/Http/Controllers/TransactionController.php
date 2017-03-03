<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;


class TransactionController extends Controller
{
    
	public function index(){
		return view('confirmation');
	}

    /**
    *  Handling User Payment Confirmation
    *  @Args: request from form
    *  @Author: Kevin Ega
    */
	function postConfirmation(Request $request) {
    	$transaction_id = $request->input('transaction_id');
    	$confirmation = $request->input('confirmation');
    	$total_payment = $request->input('total_payment');
    	$account_no = $request->input('account_no');
    	$name = $request->input('name');
		$confirmation_code = $confirmation . " - " . $account_no . " - " . $name . " - Rp. " . $total_payment;

    	$this->validate(Request(), [
	        'transaction_id' => 'required',
	        'confirmation' => 'required',
	        'total_payment' => 'required',
	    ]);

	    // $rules = [
     	//	'g-recaptcha-response' => 'required|recaptcha',
    	// ];

    	// $validator = \Validator::make(\Request::all(), $rules);
    	// if($validator->fails()) {
    	// 	return \View::make('konfirmasi')->with( 'message', "Masukkan Recaptcha Dengan Benar" );
    	// }

    	$transaction = Transaction::where("id", "=", $transaction_id)->first();

    	if ($transaction == null || $transaction == '' || $transaction->confirmation_code != '') {
            // dd($transaction);
    		return redirect('brand/confirmation')->with('message', "You entered the wrong Transaction ID.");
    	}

    	$transaction->confirmation_code = $confirmation_code;
    	$transaction->total_payment = $total_payment;
    	if($transaction->save()) {
    		$brand = $transaction->brand;
			$confirm_message = "Confirm - " . $transaction_id . " - ". $confirmation_code . " - " .$total_payment;
			$email = $brand->email;
			$data = [
					'name' => $name,
                    'confirm_message' => $confirm_message 
            		];

            Mail::send('email.confirm',$data, function($message) use ($email){
                $message->from('freeajabanget@gmail.com','Marketinc');
                $message->to($email)->subject('Account Activation: Payment Confirmation');
            });
                
    		return redirect('brand/' . Auth::guard()->user()->username)->with('message', 'Confirmation is successfully submitted, please wait 2x24 hours our admin will process your payment confirmation and will send you an email to access your paid membership.');
    	}

    }


}
