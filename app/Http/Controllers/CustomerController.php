<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginCheck(Request $request)
    {
        //return $request->all();

        if (Auth::guard('customer')->attempt(['email' => $request['email'], 'password' => $request['password']], /*$remember*/)) {
            if($request->previous_url != null){
                return \redirect($request['previous_url']);
            }
         return \redirect('/customer/address');
        } else {
            Alert::error('Sorry! ', "Email or password does not match or Your are not active");
            return back()->withInput();

        }
    }
    public function login()
    {
        if (Auth::guard('customer')->check()){
            return \redirect('/customer/profile');
        }
        $previous=URL::previous();
        return view('common.customer.login')->with('previous',$previous);
    }

    public function register()
    {
        if (Auth::guard('customer')->check()){
            return \redirect('/customer/profile');
        }
        return view('common.customer.register');
    }
    public function registerSave(Request $request)
    {
        // return $request->all();
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required',
        ]);
        try {
            $request['password'] = Hash::make($request['password']);
            Customer::create($request->except('checkbox1','_token'));
            Alert::success('Registration! ', " You have done Successfully Registered ");
            return redirect('/customer/profile');
        } catch (Exception $exception) {
            Alert::error('Registration Failed! ', $exception->getMessage());
            return back();
        }
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return \redirect('/');
    }

    public function customerProfile()
    {
        $result = Customer::with('customerAddress')->where('id',Auth::guard('customer')->user()->id)->first();
        //return $result;
        return view('common.customer.customerProfile')->with('result',$result);
    }

    public function customerOrderHistory()
    {
        return view('common.customer.customerOrderDetails');
    }

    public function customerAddress()
    {
        $result = Customer::with('customerAddress')->where('id',Auth::guard('customer')->user()->id)->first();
        //return $result;
        return view('common.customer.customerAddress')->with('result',$result);
    }

    public function customerAddressStore(Request $request)
    {
        //return $request->all();
        $request->validate([
            'address' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipCode' => 'required',
        ]);
        $request['customer_id']= Auth::guard('customer')->user()->id;
        try {
            CustomerAddress::create($request->except('_token'));
            Alert::success('Address! ', " Successfully Added ");
            return redirect('/customer/bill/pay');
        } catch (Exception $exception) {
            Alert::error('Sorry! ', $exception->getMessage());
            return back();
        }
    }

    public function customerAddressUpdate(Request $request)
    {
        //return $request->all();
        $request->validate([
            'address' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipCode' => 'required',
        ]);
        //$request['customer_id'];
        try {
            CustomerAddress::where('customer_id', $request['customer_id'])->update($request->except('_token'));
            Alert::success('Address! ', " Successfully Updated ");
            return redirect('/customer/bill/pay')->with('success', "Successfully Created");
        } catch (Exception $exception) {
            Alert::error('Sorry! ', $exception->getMessage());
            return back();
        }
    }

    public function customerBillPay()
    {
        $result = Customer::with('customerAddress')->where('id',Auth::guard('customer')->user()->id)->first();
        $shipping = Shipping::get();
        // return $result;
        return view('common.customer.customerBillPay')->with('result',$result)->with('shipping',$shipping);
    }


}
