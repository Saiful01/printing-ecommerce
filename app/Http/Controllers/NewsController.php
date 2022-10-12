<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = "Country Show";
        $data['data'] = News::orderBy('created_at', "DESC")->get();


        return view("admin.news.show")->with("result", $data);
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
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Sorry! ', " Name field is required");
            return back()->withInput();
        }
        // return $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/blog');
            $image->move($destinationPath, $image_name);
            $request->request->add(['featured_image' => '/images/blog/' . $image_name]);

        }

        $request['author_id']= Auth::user()->id;

        try {
            News::create($request->except('_token','image'));
            Alert::success('Congratulations! ', "Your data Created");
            return back()->withInput();
        } catch (\Exception $exception) {
            Alert::error('Sorry! ', $exception->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        $news= News::all();
        return  view('admin.news.show')->with('news',$news );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        // return $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/blog');
            $image->move($destinationPath, $image_name);
            $request->request->add(['featured_image' => '/images/blog/' . $image_name]);

        }

        $request['author_id']= Auth::user()->id;

        try {
            News::where('id', $news->id)->update($request->except('_token', 'image', '_method'));
            Alert::success('Congratulations! ', "Your data Updated");
            return back()->withInput();
        } catch (\Exception $exception) {
            Alert::error('Sorry! ', $exception->getMessage());
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id )
    {
        try {
            News::where('id', $id)->delete();
            Alert::success('Congratulations! ', "Your data Deleted");
            return back()->withInput();
        } catch (\Exception $exception) {
            Alert::error('Sorry! ', $exception->getMessage());
            return back();
        }
    }
}
