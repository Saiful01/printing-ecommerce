<?php

namespace App\Http\Controllers;

use App\Department;
use App\InOutMonitor;
use App\Leave;
use App\OutSideVisit;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    //

    public function _construct()
    {
        // $this->middleware('auth');
    }

    public function dashboard()
    {


        $present = InOutMonitor::leftJoin('users', 'in_out_monitors.user_id', '=', 'users.id')
            ->orderBy('in_out_monitors.created_at', 'DESC')
            ->wheredate('in_out_monitors.created_at', Carbon::today())
            ->whereNotNull('in_out_monitors.in_time')
            ->select('in_out_monitors.*', 'users.designation', 'users.id')
            ->count();
        return view('admin.dashboard.index')
            ->with('department', Department::count())
            ->with('employee', User::where('is_admin', false)->count())
            ->with('outside_visit', OutSideVisit::wheredate('created_at', Carbon::today())->count())
            ->with('present', $present)
            ->with('leave', Leave::where('is_approved', 0)->count());

    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/login');


    }
}
