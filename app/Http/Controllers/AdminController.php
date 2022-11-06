<?php

namespace App\Http\Controllers;


use App\Models\AdminRole;
use App\Models\Customer;
use App\Models\Department;
use App\Models\InOutMonitor;
use App\Models\Leave;
use App\Models\LoginHistory;
use App\Models\OutSideVisit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.dashboard.index');

    }

    public function login()
    {
        if (Auth::check()){
            return \redirect('/admin/dashboard');
        }
        return view('admin.login');

    }

    public function forgotPassword()
    {

        return view('admin.forgot_password');

    }

    public function profile()
    {
        return view('admin.profile.index');

    }

    public function profileUpdate(Request $request)
    {
        $pro_image = null;


        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/user');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $name);
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $name);
            $pro_image = '/images/user/' . $name;
        }

        $customer_array = [
            "name" => $request['name'],
            "email" => $request['email'],
            "phone" => $request['phone'],
            "profile_pic" => $pro_image
        ];
        try {
            AdminRole::where('id', Auth::user()->id)->update($customer_array);
            Alert::success('Congratulations! ', "Your Profile is updated");
            return back();
        } catch (\Exception $exception) {
            Alert::error('Sorry! ', $exception->getMessage());
            return back();
        }

    }

    public function passwordUpdate(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        if (Hash::check($request->old_password, $user->password)) {

            if ($request->new_password == $request->confirm_password) {
                User::where('id', Auth::user()->id)->update([
                    'password' => Hash::make($request->new_password)
                ]);
                Alert::success('Congratulations! ', "Your Password is updated");
                return back();

            } else {
                Alert::error('Sorry! ', "Your New Password And Confirmed password did not match");
                return back()->withInput();

            }

        } else {
            Alert::error('Sorry! ', "Your Old Password did not match");
            return back()->withInput();

        }


    }

    public function passwordChange(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user != null) {

            if ($request->new_password == $request->confirm_password) {
                User::where('id', $user->id)->update([
                    'password' => Hash::make($request->new_password)
                ]);
                Alert::success('Congratulations! ', "Your Password is updated");
                return \redirect('/admin/login');

            } else {
                Alert::error('Sorry! ', "Your New Password And Confirmed password did not match");
                return back()->withInput();

            }

        } else {
            Alert::error('Sorry! ', "Your Given Email Has No Account, Please Correct Email");
            return back()->withInput();

        }


    }

    public function logout()
    {

        Auth::logout();
        return Redirect::to('/admin/login');

    }

    public function loginCheck(Request $request)
    {


        $email = $request['email'];
        $password = $request['password'];
        $remember = true;

        if (Auth::attempt(['email' => $email, 'password' => $password, 'is_active' => true], $remember)) {
            try {
                LoginHistory::create([
                    'ip_address' => request()->ip(),
                    'admin_id' => Auth::id()
                ]);
            } catch (\Exception $exception) {
                Alert::error('Sorry! ', $exception->getMessage());
                return back();
            }

            return Redirect::to('/admin/dashboard');
        } else {
            Alert::error('Sorry! ', "Email or password does not match or Your are not active");
            return back()->withInput();

        }

        return view('admin.login');

    }


    public function customersList()
    {
        $results = Customer::with('customerAddress')->where('id',Auth::guard('customer')->user()->id)->get();
       // return $results;
        return view('admin.customers.index')->with('results',$results);
    }
}
