<?php

namespace App\Http\Controllers;

use App\Models\CustomPrint;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CustomPrintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.customPrint.create");
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'min' => 'required',
            'max' => 'required',
            'photo_premium_glossy' => 'required',
            'canvas' => 'required',
            'banner' => 'required',
            'self_adhesive' => 'required',
        ]);
        try {
            CustomPrint::create($request->all());
            Alert::success('Custom Print! ', " Price Successfully Added");
            return redirect('/admin/custom/price/show');
        } catch (Exception $exception) {
            Alert::error('Sorry! ', $exception->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomPrint  $customPrint
     * @return \Illuminate\Http\Response
     */
    public function show(CustomPrint $customPrint)
    {
        $results = CustomPrint::orderBy('created_at', 'DESC')->get();
        //return $results;
        return view("admin.customPrint.show")->with('results', $results);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomPrint  $customPrint
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomPrint $customPrint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomPrint  $customPrint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomPrint $customPrint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomPrint  $customPrint
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            CustomPrint::where('id', $id)->delete();
            Alert::success('Custom Print! ', " Price Successfully Deleted");
            return back();
        } catch (Exception $exception) {
            Alert::error('Sorry! ', $exception->getMessage());
            return back();
        }
    }
}
