<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.tax.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->all();
        try {
            Tax::create($request->except('_token'));
            return redirect('/admin/tax/show')->with('success', "Successfully Created");

        } catch (Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function show(Tax $tax)
    {
        $results = Tax::orderBy('created_at', 'DESC')->get();
        //return $results;
        return view("admin.tax.show")->with('results',$results);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $results = Tax::where('id', $id)->first();
        return view('admin.tax.edit')->with('results', $results);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tax $tax)
    {
        // return $request->all();
        try {
            Tax::where('id', $request['id'])->update($request->except(['id', '_token']));
            return redirect('/admin/tax/show')->with('success', "Successfully Updated");

        } catch (Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Tax::where('id', $id)->delete();
            return back()->with('success', "Successfully Deleted");

        } catch (Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }
    }
}
