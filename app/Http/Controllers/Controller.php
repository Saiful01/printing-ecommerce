<?php

namespace App\Http\Controllers;


use App\Models\AluminiumPrint;
use App\Models\FoamCoreBoard;
use App\Models\PosterPrint;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


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
            ->with("temporary_image", $temporary_image)
            ->with("image_name", uniqid());
    }

    public function wallArtPoster()
    {
        $posters = Product::where("is_public", 1)->get();
        $poster_size = PosterPrint::get();
        return view('common.create-poster.wall-art-poster')
            ->with("posters", $posters)
            ->with("poster_size", $poster_size);
    }

    public function wallArtPosterDetails($id)
    {
        $poster = Product::where('id', $id)->first();
        $posterPrint = PosterPrint::get();
        //return $posterPrint;
        return view('common.create-poster.wall-art-poster-details')
            ->with("poster", $poster)
            ->with("poster_size", $posterPrint);
    }

    public function showBanner()
    {
        return view('common.pages.banner');
    }

    public function foamBoard()
    {
        return view('common.pages.foam-board-print');
    }

    public function aluminiumPrint()
    {
        return view('common.pages.aluminum-prints');
    }

    public function mountedFoamBoard()
    {
        return view('common.pages.mounted-foam-board');
    }

    public function paperTypes()
    {
        return view('common.pages.paper-types');
    }

    public function customizePosterPrint()
    {
        return view('common.pages.customize-poster-print');
    }

    public function showContactUs()
    {
        return view('common.pages.contact');
    }

    public function showPricing()
    {
        $result = PosterPrint::get();
        //return $result;
        return view('common.pages.pricing')->with('result', $result);
    }

    public function showTermsAndConditions()
    {
        return view('common.pages.terms-and-conditions');
    }

    public function showReturnPolicy()
    {
        return view('common.pages.return');
    }

    public function showFAQ()
    {
        return view('common.pages.faq');
    }

    public function cart()
    {
        return view('common.create-poster.cart');
    }

    public function orderNew()

    {
        if (!Auth::guard('customer')->check()) {
            return redirect('/customer/login');
        }
        return view('common.create-poster.cart');
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
        //return $request['title'];
        $array = [
            'title' => $request['title'],
            'price' => $request['price'],
            'featured_image' => $request['featured_image'],
            'size' => $request['size'],
        ];

        $name = $request['name'];
        $get_id = "";
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $imageName = $name . '.' . $image->extension();
            $image->move(public_path('uploads'), $imageName);
            Session::put("temporary_image2", $imageName);
            try {
                $get_id = Product::insertGetId($array);
            } catch (\Exception $exception) {
                return $exception->getMessage();
            }

            return [
                'status' => 'success',
                'message' => 'Image Uploaded Successfully',
                'image' => $imageName,
                'id' => $get_id
            ];
        }

        return $get_id;
    }


}
