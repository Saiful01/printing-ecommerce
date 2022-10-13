<?php

namespace App\Http\Controllers;


use App\Models\AluminiumPrint;
use App\Models\FoamCoreBoard;
use App\Models\PosterPrint;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
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
        return view('common.create-poster.poster')
            ->with("poster_print", $poster_print)
            ->with("aluminium_print", $aluminium_print)
            ->with("foam_board", $foam_board);
    }

    function profile()
    {
        return view('common.membership.profile');
    }


}
