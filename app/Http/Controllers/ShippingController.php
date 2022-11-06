<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.shipping.create");
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
            Shipping::create($request->except('_token'));
            Alert::success('Shipping Details! ', " Successfully Added");
            return redirect('/admin/shipping/show');

        } catch (Exception $exception) {
            Alert::error('Sorry! ', $exception->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Shipping $shipping
     * @return \Illuminate\Http\Response
     */
    public function show(Shipping $shipping)
    {
        $results = Shipping::orderBy('created_at', 'DESC')->get();
        //return $results;
        return view("admin.shipping.show")->with('results', $results);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Shipping $shipping
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $results = Shipping::where('id', $id)->first();
        return view('admin.shipping.edit')->with('results', $results);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Shipping $shipping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipping $shipping)
    {
        // return $request->all();
        try {
            Shipping::where('id', $request['id'])->update($request->except(['id', '_token']));
            Alert::success('Shipping Details! ', " Successfully Updated");
            return redirect('/admin/shipping/show');

        } catch (Exception $exception) {
            Alert::error('Sorry! ', $exception->getMessage());
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Shipping $shipping
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Shipping::where('id', $id)->delete();
            return back()->with('success', "Successfully Deleted");
            return back();

        } catch (Exception $exception) {
            Alert::error('Sorry! ', $exception->getMessage());
            return back();
        }
    }
}
