<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class AdminHomeController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
   	}

    public function index(){
        $transactions = Transaction::all();
        return view('admin-home')->with(['transactions'=>$transactions]);
    }

    public function approveTransaction($id) {
    	$transaction = Transaction::where("id", "=", $id)->first();
    	$transaction->flag = Auth::user('admin')->name;

    	if($transaction->save() && $transaction->confirmation_code != NULL) {
    		$transaction_id = $transaction->transaction_id;
    		$username = $transaction->username;
    		$email = $transaction->email;
            $total_payment = $transaction->total_payment;

            $sesuatu = ['transaction_id' => $transaction_id, 'username' => $username];
        
        	Mail::send('email.verifypayment',$sesuatu, function($message) use ($email){
	            $message->from('freeajabanget@gmail.com','Marketinc');
	            $message->to($email)->subject('Verify your email address');
	        });

    		return Redirect::to('admin/home');
    	}

    	return false; //error gagal approve
    }

    function deleteTransaction($id) {
    	$transaction = Transaction::where("id", "=", $id)->first();
    	$transaction_id = $transaction->transaction_id;
    	$username = $transaction->username;
    	$email = $transaction->email;

    	if($transaction->delete()) {
    		$data = ['transaction_id' => $transaction_id, 'username' => $username];

        	Mail::send('email.verifypayment',$Ddat, function($message) use ($email){
	            $message->from('freeajabanget@gmail.com','Marketinc');
	            $message->to($email)->subject('Verify your email address');
	    	});	
    		return Redirect::to('admin/home');
    		
   		}
    }
  
}








