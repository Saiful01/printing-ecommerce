<?php

namespace App\Http\Controllers;


use App\Models\Gallery;
use App\Models\News;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use niklasravnsborg\LaravelPdf\Facades\Pdf;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home()
    {

        $gallery = Gallery::where('is_active', true)->get();
        $news = News::where('is_active', true)->get();
        return view('common.home.index')
            ->with('gallery', $gallery)
            ->with('news', $news);
    }


    function profile()
    {
        return view('common.membership.profile');
    }



}
