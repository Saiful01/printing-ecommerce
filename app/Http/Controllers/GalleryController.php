<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = "Gallery Show";
        $data['data'] = Gallery::orderBy('created_at', "DESC")->get();


        return view("admin.gallery.show")->with("result", $data);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'images' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Sorry! ', " Image is required");
            return back()->withInput();
        }
        //  return $request->all();

        if ($request->hasfile('images')) {
            $i = 1;

            foreach ($request->file('images') as $image) {
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/gallery');
                $image->move($destinationPath, $image_name);
                $request->request->add(['featured_image' => '/images/gallery/' . $image_name]);
                $images = [
                    'featured_image' => $request['featured_image'],
                    ];
                Gallery::create($images);
                $i++;
            }


        }
        try {
            Alert::success('Congratulations! ', "Your Image Uploaded");
            return back()->withInput();
        } catch (\Exception $exception) {
            Alert::error('Sorry! ', $exception->getMessage());
            return back();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Gallery::where('id', $id)->delete();
            Alert::success('Congratulations! ', "Your data Deleted");
            return back()->withInput();
        } catch (\Exception $exception) {
            Alert::error('Sorry! ', $exception->getMessage());
            return back();
        }
    }
}
