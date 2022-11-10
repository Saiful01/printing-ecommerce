<?php

namespace App\Http\Controllers;


use App\Models\AdminRole;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\Department;
use App\Models\InOutMonitor;
use App\Models\Leave;
use App\Models\LoginHistory;
use App\Models\Order;
use App\Models\OutSideVisit;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index()
    {
        //Customer Count & Percentage Count
        $customers = Customer::count();
        $customePreviousMonthUsers = Customer::whereMonth('created_at', now()->month - 1)->count();
        $customeThisMonthUsers = Customer::whereMonth('created_at', now()->month)->count();
        if ($customePreviousMonthUsers > 0) {
            // If it has decreased then it will give you a percentage with '-'
            $customerDifferenceInpercentage = ($customeThisMonthUsers - $customePreviousMonthUsers) * 100 / $customePreviousMonthUsers;
        } else {
            $customerDifferenceInpercentage = $customeThisMonthUsers > 0 ? '100' : '0';
        }

        //Wall Art & Poster Count & Percentage Count
        $wallArtCount = Product::count();
        $wallArtPreviousMonth = Product::whereMonth('created_at', now()->month - 1)->count();
        $wallArtThisMonth = Product::whereMonth('created_at', now()->month)->count();
        if ($wallArtPreviousMonth > 0) {
            // If it has decreased then it will give you a percentage with '-'
            $wallArtDifferenceInpercentage = ($wallArtThisMonth - $wallArtPreviousMonth) * 100 / $wallArtPreviousMonth;
        } else {
            $wallArtDifferenceInpercentage = $wallArtThisMonth > 0 ? '100' : '0';
        }

        //Total Coupon Count & Percentage Count
        $couponCount = Coupon::count();
        $couponPreviousMonth = Coupon::whereMonth('created_at', now()->month - 1)->count();
        $couponThisMonth = Coupon::whereMonth('created_at', now()->month)->count();
        if ($couponPreviousMonth > 0) {
            // If it has decreased then it will give you a percentage with '-'
            $couponDifferenceInpercentage = ($couponThisMonth - $couponPreviousMonth) * 100 / $couponPreviousMonth;
        } else {
            $couponDifferenceInpercentage = $couponThisMonth > 0 ? '100' : '0';
        }
        // return $couponDifferenceInpercentage;
        //return $couponCount;

        //Active  Coupon Count & Percentage Count
        $activeCouponCount = Coupon::where('is_active', 1)->count();
        $activeCouponPreviousMonth = Coupon::whereMonth('created_at', now()->month - 1)->count();
        $activeCouponThisMonth = Coupon::whereMonth('created_at', now()->month)->count();
        if ($activeCouponPreviousMonth > 0) {
            // If it has decreased then it will give you a percentage with '-'
            $activeCouponDifferenceInpercentage = ($activeCouponThisMonth - $activeCouponPreviousMonth) * 100 / $activeCouponPreviousMonth;
        } else {
            $activeCouponDifferenceInpercentage = $activeCouponThisMonth > 0 ? '100' : '0';
        }
        // return $activeCouponDifferenceInpercentage;
        //return $activeCouponCount;

        //Active  Coupon Count & Percentage Count
        $inActiveCouponCount = Coupon::where('is_active', 0)->count();
        $inActiveCouponPreviousMonth = Coupon::whereMonth('created_at', now()->month - 1)->count();
        $inActiveCouponThisMonth = Coupon::whereMonth('created_at', now()->month)->count();
        if ($inActiveCouponPreviousMonth > 0) {
            // If it has decreased then it will give you a percentage with '-'
            $inActiveCouponDifferenceInpercentage = ($inActiveCouponThisMonth - $inActiveCouponPreviousMonth) * 100 / $inActiveCouponPreviousMonth;
        } else {
            $inActiveCouponDifferenceInpercentage = $inActiveCouponThisMonth > 0 ? '100' : '0';
        }
        // return $inActiveCouponDifferenceInpercentage;
        //return $inActiveCouponCount;

        //Order Count & Percentage Count
        $orderCount = Order::count();
        $orderPreviousMonth = Order::whereMonth('updated_at', now()->month - 1)->count();
        $orderThisMonth = Order::whereMonth('updated_at', now()->month)->count();
        if ($orderPreviousMonth > 0) {
            // If it has decreased then it will give you a percentage with '-'
            $orderDifferenceInpercentage = ($orderThisMonth - $orderPreviousMonth) * 100 / $orderPreviousMonth;
        } else {
            $orderDifferenceInpercentage = $orderThisMonth > 0 ? '100' : '0';
        }
        // return $orderDifferenceInpercentage;
        //return $orderCount;

        //Earning Count & Percentage Count
        $earningCount = Order::sum('sub_price');;
        $earningPreviousMonth = Order::whereMonth('updated_at', now()->month - 1)->count();
        $earningThisMonth = Order::whereMonth('updated_at', now()->month)->count();
        if ($earningPreviousMonth > 0) {
            // If it has decreased then it will give you a percentage with '-'
            $earningDifferenceInpercentage = ($earningThisMonth - $earningPreviousMonth) * 100 / $earningPreviousMonth;
        } else {
            $earningDifferenceInpercentage = $earningThisMonth > 0 ? '100' : '0';
        }
        // return $earningDifferenceInpercentage;
        //return $earningCount;

        //Recent Order List
        $recentOrder = Order::with("customer")->orderBy('created_at', 'DESC')->get();
        //return $recentOrder;

        return view('admin.dashboard.index')
            ->with('customers', $customers)
            ->with('customerDifferenceInpercentage', $customerDifferenceInpercentage)
            ->with('wallArtCount', $wallArtCount)
            ->with('wallArtDifferenceInpercentage', $wallArtDifferenceInpercentage)
            ->with('couponCount', $couponCount)
            ->with('couponDifferenceInpercentage', $couponDifferenceInpercentage)
            ->with('activeCouponCount', $activeCouponCount)
            ->with('activeCouponDifferenceInpercentage', $activeCouponDifferenceInpercentage)
            ->with('orderCount', $orderCount)
            ->with('orderDifferenceInpercentage', $orderDifferenceInpercentage)
            ->with('earningCount', $earningCount)
            ->with('earningDifferenceInpercentage', $earningDifferenceInpercentage)
            ->with('inActiveCouponCount', $inActiveCouponCount)
            ->with('inActiveCouponDifferenceInpercentage', $inActiveCouponDifferenceInpercentage)
            ->with('recentOrder', $recentOrder);

    }

    public function login()
    {
        if (Auth::check()) {
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
