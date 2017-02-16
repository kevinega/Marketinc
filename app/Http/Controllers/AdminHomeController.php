<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Brand;
use DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{
    /**
    * Function for checking if admin
    */
    public function __construct(){
        $this->middleware('admin');
   	}

    /**
    *  Handling Transaction Page Request without sorting
    *  @Author: Kevin Ega
    */
    public function transactionManagementPage(){
        $transactions = Transaction::all();
        dd($transactions);
        return view('admin.home')->with(['transactions'=>$transactions]);
    }

    /**
    *  Handling Transaction Page Request with sorting
    *  @Args: orderBy (sorted by what)
    *  @Author: Kevin Ega
    */
    public function transactionManagementPageOrder($orderBy){
        if($orderBy == 'brand_name' || $orderBy =='valid_until'){
        $transactions =  Transaction::select(DB::raw('transactions.*, count(*) as `aggregate`'))
                        ->join('brands', 'transactions.brand_id', '=', 'brands.id')
                        ->groupBy('brands.id')
                        ->orderBy($orderBy, 'desc')
                        ->paginate(10);

        }else{
        $transactions = Transaction::orderBy($orderBy, 'desc')->get();
        }
        //dd($transactions);
        return view('admin.home')->with(['transactions'=>$transactions]);
    }

    /**
    *  Handling Brand Management Page Request without sorting
    *  @Author: Kevin Ega
    */
    public function brandManagementPage(){
        $brands = Brand::all();
        return view('admin.brand-management')->with(['brands'=>$brands]);
    }

    public function brandManagementPageOrder($orderBy){
        $brands = Brand::orderBy($orderBy, 'desc')->get();
        return view('admin.brand-management')->with(['brands'=>$brands]);
    }
    /**
    *  Handling for Approving Transaction in Transaction Management Page
    *  @Args: id (which id will be affected)
    *  @Author: Kevin Ega
    */
    public function approveTransaction($id) {
    	$transaction = Transaction::where("id", "=", $id)->first();
    	$transaction->flag = Auth::guard('admin_users')->user()->name;
        $name = $transaction->name;
    	if($transaction->save() && $transaction->confirmation_code != NULL) {
    		$brand = $transaction->brand;
            if($brand){
                $brand->membership = $transaction->type;
                $brand->valid_until = date('Y-m-d H:i:s', strtotime("+30 days"));
                $brand->status = 'active';
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
                    return redirect('unicorn/home')->w;
                }
            }
    	}

    	return false; //error gagal approve
    }


    /**
    *  Handling for Deleting a Transaction in Transaction Management Page
    *  @Args: id (which id will be affected)
    *  @Author: Kevin Ega
    */
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
    		return redirect('unicorn/home');
    		
   		}
    }

     /**
    *  Handling for Reseting Brand's Membership in Brand Management Page
    *  @Args: id (which id will be affected)
    *  @Author: Kevin Ega
    */
    function resetMembership($id) {

        $brand = Brand::where("id", "=", $id)->first();
        if(!$brand){
            throw new Exception("There are some issues reseting the membership please try again later.", 1);
        }
        $email = $brand->email;
        $brand->membership = 'free';

        if($brand->save()) {
            $data = ['brand_name' => $brand->brand_name, 'username' => $brand->username];

            Mail::send('email.deleteTransaction',$data, function($message) use ($email){
                $message->from('freeajabanget@gmail.com','Marketinc');
                $message->to($email)->subject('Account Activation: Expired Payment');
            }); 
            return redirect('unicorn/brand');
            
        }
    }
  
}








