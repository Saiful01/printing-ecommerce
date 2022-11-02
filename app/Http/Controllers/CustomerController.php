<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerAddress;
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
         return \redirect('/customer/profile');
        } else {
            return "not Ok";
            Alert::error('Sorry! ', "Phone or password does not match or Your are not active");
            return back()->withInput();

        }
    }
    public function login()
    {
        $previous=URL::previous();
        return view('common.customer.login')->with('previous',$previous);
    }

    public function register()
    {
        return view('common.customer.register');
    }
    public function registerSave(Request $request)
    {
         //return $request->all();
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required',
        ]);
        try {
            $request['password'] = Hash::make($request['password']);
            Customer::create($request->except('checkbox1','_token'));
            return redirect('/customer/login')->with('success', "Successfully Created");
        } catch (Exception $exception) {

            return back()->with('success', $exception->getMessage());
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

    public function customerAddress()
    {
        return view('common.customer.customerAddress');
    }

    public function customerAddressStore(Request $request)
    {
        //return $request->all();
        $request->validate([
          /*  'company' => 'required',*/
            'address' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipCode' => 'required',
        ]);
        $request['customer_id']= Auth::guard('customer')->user()->id;
        try {
            CustomerAddress::create($request->except('_token'));
            return redirect('/customer/billing/address')->with('success', "Successfully Created");
        } catch (Exception $exception) {

            return back()->with('success', $exception->getMessage());
        }
    }

    public function customerAddressShow()
    {
        $result = CustomerAddress::where('id',Auth::guard('customer')->user()->id)->first();
        return $result;
        return view('common.customer.customerBillingAddress')->with('result',$result);
    }

    public function customerBillingAddress()
    {
        return view('common.customer.customerBillingAddress');
    }

    public function customerBillPay()
    {
        return view('common.customer.customerBillPay');
    }

    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
