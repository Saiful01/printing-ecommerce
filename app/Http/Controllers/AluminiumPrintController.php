<?php

namespace App\Http\Controllers;

use App\Models\AluminiumPrint;
use Illuminate\Http\Request;

class AluminiumPrintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.aluminumPrint.create");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $request->validate([
            'title' => 'required',
            'price' => 'required',
        ]);
        try {
            AluminiumPrint::create($request->all());
            return redirect('/admin/aluminum/price/show')->with('success', "Successfully Created");
        } catch (Exception $exception) {

            return back()->with('success', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AluminiumPrint  $aluminiumPrint
     * @return \Illuminate\Http\Response
     */
    public function show(AluminiumPrint $aluminiumPrint)
    {
        $results = AluminiumPrint::orderBy('created_at', 'DESC')->get();
        //return $results;
        return view("admin.aluminumPrint.show")->with('results', $results);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AluminiumPrint  $aluminiumPrint
     * @return \Illuminate\Http\Response
     */
    public function edit(AluminiumPrint $aluminiumPrint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AluminiumPrint  $aluminiumPrint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AluminiumPrint $aluminiumPrint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AluminiumPrint  $aluminiumPrint
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            AluminiumPrint::where('id', $id)->delete();
            return back()->with('success', "Successfully Deleted");
        } catch (Exception $exception) {

            return back()->with('success', $exception->getMessage());
        }
    }
}
