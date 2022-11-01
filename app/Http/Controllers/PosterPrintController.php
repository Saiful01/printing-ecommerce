<?php

namespace App\Http\Controllers;

use App\Models\PosterPrint;
use Illuminate\Http\Request;

class PosterPrintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.posterPrint.create");
    }

    public function store(Request $request)
    {
       // return $request->all();
        $request->validate([
            'title' => 'required',
            'photo_premium_glossy' => 'required',
            'canvas' => 'required',
            'banner' => 'required',
            'self_adhesive' => 'required',
        ]);
        try {
            PosterPrint::create($request->all());
            return redirect('/admin/poster/price/show')->with('success', "Successfully Created");
        } catch (Exception $exception) {

            return back()->with('success', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PosterPrint  $posterPrint
     * @return \Illuminate\Http\Response
     */
    public function show(PosterPrint $posterPrint)
    {
        $results = PosterPrint::orderBy('created_at', 'DESC')->get();
        //return $results;
        return view("admin.posterPrint.show")->with('results', $results);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PosterPrint  $posterPrint
     * @return \Illuminate\Http\Response
     */
    public function edit(PosterPrint $posterPrint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PosterPrint  $posterPrint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PosterPrint $posterPrint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PosterPrint  $posterPrint
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            PosterPrint::where('id', $id)->delete();
            return back()->with('success', "Successfully Deleted");
        } catch (Exception $exception) {

            return back()->with('success', $exception->getMessage());
        }
    }
}
