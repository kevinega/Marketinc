<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;


class TransactionController extends Controller
{
    
	public function index(){
		return view('confirmation');
	}

	function postConfirmation(Request $request) {
    	$transaction_id = $request->input('transaction_id');
    	$confirmation = $request->input('confirmation');
    	$total_payment = $request->input('jumlah_bayar');
    	$account_no = $request->input('account_no');
    	$name = $request->input('name');
		$confirmation_code = $confirmation . " - " . $account_no . " - " . $name . " - Rp. " . $total_payment;

		// $forkode = $kode;
		// $forkonfirmasi = $konfirmasi;
		// $forjumlah_bayar = $jumlah_bayar;

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

    	$transaction = Transaction::where("transaction_id", "=", $transaction_id)->first();
    	
    	if($transaction == null || $transaction == "") {
    		return View::make('confirmation')->with( 'message', "Transaction ID Invalid" );
    	}

    	$transaction->confirmation_code = $confirmation_code;
    	$transaction->total_payment = $total_payment;

    	if($transaction->save()) {
			$confirm_message = "Confirm - " . $transaction_id . " - ". $confirmation_code . " - " .$total_payment;
			$email = $transaction->email;
			$data = [
					'name' => $name,
                    'confirm_message' => $confirm_message 
            		];

            Mail::send('email.confirm',$data, function($message) use ($email){
                $message->from('freeajabanget@gmail.com','Marketinc');
                $message->to($email)->subject('Account Activation: Payment Confirmation');
            });
                
    		return view('confirmation');
    	}
    	 dd('failed');

    }


}
