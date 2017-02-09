<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Brand;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

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
    	$transaction->flag = Auth::guard('admin_users')->user()->name;
        $name = $transaction->name;
    	if($transaction->save() && $transaction->confirmation_code != NULL) {
    		$brand = Brand::where('brand_name','=',$name)->first();
            if($brand){
                $brand->membership = $transaction->type;
                if ($brand->save()){
                    $email = $brand->email;
                    $data = [
                                'username' => $brand->username, 
                                'membership' => $transaction->type,
                            ];
        
                    Mail::send('email.upgrade',$data, function($message) use ($email){
                        $message->from('freeajabanget@gmail.com','Marketinc');
                        $message->to($email)->subject('Account Activation: Membership Upgrade');
                    });
                    return redirect('admin/home');
                }
            }
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

        	Mail::send('email.deleteTransaction',$data, function($message) use ($email){
	            $message->from('freeajabanget@gmail.com','Marketinc');
	            $message->to($email)->subject('Account Activation: Expired Payment');
	    	});	
    		return redirect('admin/home');
    		
   		}
    }
  
}








