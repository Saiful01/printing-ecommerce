<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.wallPoster.create");
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

        $request->validate([
            'title' => 'required',
            'short_details' => 'required',
            'details' => 'required',
            'price' => 'required',
            'tag' => 'required',
        ]);
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(990, 1272);
            $image_resize->save(public_path('/wallPoster/' . $image_name));
            $request['featured_image'] = '/wallPoster/' . $image_name;
        }
      //  return $request->all();
        try {
            Product::create($request->except(['_token','image']));
            return redirect('/admin/wall-art-poster/show')->with('success', "Successfully Created");
        } catch (Exception $exception) {

            return back()->with('success', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $results = Product::orderBy('created_at', 'DESC')->get();
        //return $results;
        return view("admin.wallPoster.show")->with('results', $results);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $results = Product::where('id', $id)->first();
        return view("admin.wallPoster.edit")->with('results', $results);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required',
            'short_details' => 'required',
            'details' => 'required',
            'price' => 'required',
            'tag' => 'required',
        ]);
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(990, 1272);
            $image_resize->save(public_path('/wallPoster/' . $image_name));
            $request['featured_image'] = '/wallPoster/' . $image_name;

        }

        //  return $request->all();
        try {
            Product::where('id', $request['id'])->update($request->except(['_token', 'image']));
            return redirect('/admin/wall-art-poster/show')->with('success', "Successfully Updated");
        } catch (Exception $exception) {

            return back()->with('success', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {try {
        Product::where('id', $id)->delete();
        return back()->with('success', "Successfully Deleted");
    } catch (Exception $exception) {

        return back()->with('success', $exception->getMessage());
    }
    }
}
