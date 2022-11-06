<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Customer;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.coupon.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->all();
        try {
            Coupon::create($request->except('_token'));
            return redirect('/admin/coupon/show')->with('success', "Successfully Created");

        } catch (Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {

        $results = Coupon::orderBy('created_at', 'DESC')->get();
        return view("admin.coupon.show")->with('results', $results);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $results = Coupon::where('id', $id)->first();
        return view('admin.coupon.edit')->with('results', $results);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        // return $request->all();
        try {
            Coupon::where('id', $request['id'])->update($request->except(['id', '_token']));
            return redirect('/admin/coupon/show')->with('success', "Successfully Updated");

        } catch (Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Coupon::where('id', $id)->delete();
            return back()->with('success', "Successfully Deleted");

        } catch (Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }
    }
}
