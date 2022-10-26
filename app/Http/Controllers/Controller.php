<?php

namespace App\Http\Controllers;


use App\Models\AluminiumPrint;
use App\Models\FoamCoreBoard;
use App\Models\PosterPrint;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use niklasravnsborg\LaravelPdf\Facades\Pdf;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home()
    {

        return view('common.home.index');
    }


    function startJourney()
    {
        return view('common.create-poster.start');

    }

    function createPoster()
    {
        $poster_print = PosterPrint::get();
        $aluminium_print = AluminiumPrint::get();
        $foam_board = FoamCoreBoard::get();

        $temporary_image = Session::get("temporary_image");
        return view('common.create-poster.poster')
            ->with("poster_print", $poster_print)
            ->with("aluminium_print", $aluminium_print)
            ->with("foam_board", $foam_board)
            ->with("temporary_image", $temporary_image);
    }

    function profile()
    {
        return view('common.membership.profile');
    }

    function dropZoneStore(Request $request)
    {
        //return $request->all();

        /*   if ($request->hasFile('image')) {
               $image = $request->file('image');
               $image_name = time() . '.' . $image->getClientOriginalExtension();
               $destinationPath = public_path('/images/blog');
               $image->move($destinationPath, $image_name);
               $request->request->add(['featured_image' => '/images/blog/' . $image_name]);

           }*/

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('uploads'), $imageName);
            Session::put("temporary_image", $imageName);

            return $imageName;
        }

    }

    public function uploadCropImage(Request $request)
    {

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $imageName = "ggg".time() . '.' . $image->extension();
            $image->move(public_path('uploads'), $imageName);
            Session::put("temporary_image", $imageName);

            return $imageName;
        }

        return $request->all();
    }


}
