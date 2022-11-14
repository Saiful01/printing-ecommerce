<?php

namespace App\Http\Controllers;


use App\Models\Tax;
use Illuminate\Http\Request;

class WebApiController extends Controller
{

    public function getStates($country_id)
    {


    }
    public function getTaxFee()
    {
       $data= Tax::where('id',1)->first()->amount;
       return [
           'status_code'=> 200,
           'data'=> $data,
       ];

    }
}
