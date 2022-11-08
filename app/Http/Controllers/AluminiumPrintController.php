<?php

namespace App\Http\Controllers;

use App\Models\AluminiumPrint;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
            Alert::success('Aluminium Print! ', " Price Successfully Added");
            return redirect('/admin/aluminum/price/show');
        } catch (Exception $exception) {
            Alert::error('Sorry! ', $exception->getMessage());
            return back();
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
    public function edit($id)
    {
        $results = AluminiumPrint::where('id', $id)->first();
        return view("admin.aluminumPrint.edit")->with('results', $results);
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
        $request->validate([
            'title' => 'required',
            'price' => 'required',
        ]);

        //  return $request->all();
        try {
            AluminiumPrint::where('id', $request['id'])->update($request->except(['_token']));
            Alert::success('Aluminium Print! ', " Price Successfully Updated");
            return redirect('/admin/aluminum/price/show');
        } catch (Exception $exception) {
            Alert::error('Sorry! ', $exception->getMessage());
            return back();
        }
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
            Alert::success('Aluminium Print! ', " Price Successfully Deleted");
            return back();
        } catch (Exception $exception) {
            Alert::error('Sorry! ', $exception->getMessage());
            return back();
        }
    }
}
