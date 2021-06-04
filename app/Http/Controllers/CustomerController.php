<?php

namespace App\Http\Controllers;
use App\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function manage_customer(){
        $customer = Customer::orderby('customer_id', 'DESC')->get();
        return view('admin.manage_customer')->with(compact('customer'));
    }
    public function unactive_customer($customer_id){
        DB::table('tbl_customer')->where('customer_id',$customer_id)->update(['customer_status'=>1]);
        Session::put('message','Khóa người dùng thành công');
        return Redirect::to('manage-customer');
    }
    public function active_customer($customer_id){
        DB::table('tbl_customer')->where('customer_id',$customer_id)->update(['customer_status'=>0]);
        Session::put('message','Bỏ khóa người dùng thành công');
        return Redirect::to('manage-customer');
    }
}
