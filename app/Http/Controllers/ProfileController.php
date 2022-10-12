<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index($id){
       $data = User::where('id',$id)->first();
        return view ('admin.profile.profile')->with('data',$data);
    }
    public function update(Request $request)
    {
        //return $request->all();

        unset($request['_token']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/user');
            $image->move($destinationPath, $image_name);
            $request['profile_pic'] = $image_name;
        }
         $request['password']= Hash::make($request['password']);

        try {

            User::where('id', Auth::user()->id)->update($request->except(['image']));
            return back()->with('success', "Successfully Updated ");
        }
        catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }
    }
}
