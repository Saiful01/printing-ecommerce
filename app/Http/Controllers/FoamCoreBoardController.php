<?php

namespace App\Http\Controllers;

use App\Models\FoamCoreBoard;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FoamCoreBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.foamPrint.create");
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
            FoamCoreBoard::create($request->all());
            Alert::success('Foam Core Board Print! ', " Price Successfully Added");
            return redirect('/admin/foam-board/price/show')->with('success', "Successfully Created");
        } catch (Exception $exception) {
            Alert::error('Sorry! ', $exception->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoamCoreBoard  $foamCoreBoard
     * @return \Illuminate\Http\Response
     */
    public function show(FoamCoreBoard $foamCoreBoard)
    {
        $results = FoamCoreBoard::orderBy('created_at', 'DESC')->get();
        //return $results;
        return view("admin.foamPrint.show")->with('results', $results);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoamCoreBoard  $foamCoreBoard
     * @return \Illuminate\Http\Response
     */
    public function edit(FoamCoreBoard $foamCoreBoard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FoamCoreBoard  $foamCoreBoard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoamCoreBoard $foamCoreBoard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoamCoreBoard  $foamCoreBoard
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            FoamCoreBoard::where('id', $id)->delete();
            Alert::success('Foam Core Board Print! ', " Price Successfully Deleted");
            return back();
        } catch (Exception $exception) {
            Alert::error('Sorry! ', $exception->getMessage());
            return back();
        }
    }
}
