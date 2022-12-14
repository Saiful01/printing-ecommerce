<?php


use App\Models\BlogCategory;
use App\Models\CustomerAddress;
use App\Models\Department;
use App\Models\InOutMonitor;
use App\Models\Leave;
use App\Models\LoginHistory;
use App\Models\PosterPrint;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

function getErrorMessage($param)
{
    return $param;
}
function getPosterSize()
{
    return PosterPrint::all();
}
function getOrderStatus()
{
  return  $array=[
        '1'=> "Pending",
        '2'=> "Accepted",
        '3'=> "Processing",
        '4'=> "delivered",
        '5'=> "Canceled",
        '6'=> "Refund",
    ];
}
function getOrderStatusIdToValue($id)
{
    if ($id == null) {
        return "-";
    }
    $array=[
        '1'=> "Pending",
        '2'=> "Accepted",
        '3'=> "Processing",
        '4'=> "delivered",
        '5'=> "Canceled",
        '6'=> "Refund",
    ];
    return $array[$id];

}

function getNameFromId($id)
{

    $user = User::where('id', $id)->first();
    if (is_null($user)) {
        return "-";
    } else {
        return $user->name;

    }
}
function getIntValue($value)
{
    return $value;

  return intval($value);
}
function getIntDecimalValue($value)
{
    return intval ($value* 100);
  return  number_format((float)$value, 2, '.', '');

}

function getTotalDuration($inTime, $outTime)
{

    $startTime = Carbon::parse($inTime);
    $finishTime = Carbon::parse($outTime);
    $totalDuration = $finishTime->diffInSeconds($startTime);
    return gmdate('H:i:s', $totalDuration);
    $totalDuration = $finishTime->diffForHumans($startTime);
    return $totalDuration;
}


function getDateFormat($date)
{

    if ($date == null) {
        return "-";
    }
    $createdAt = Carbon::parse($date);
    return $createdAt->format('d M, Y g:i A');
}

function getExpireDateFormat($date)
{

    if ($date == null) {
        return "-";
    }
    $createdAt = Carbon::parse($date);
    return $createdAt->format('d/m/Y');
}


function getTimeOnly($date)
{
    return Carbon::createFromFormat('H:i:s', $date)->format('h:i:s');
}
function isAddress()
{
    if (!Auth::guard('customer')->check()){
        return false;
    }
    $exist= CustomerAddress::where('customer_id', Auth::guard('customer')->user()->id)->first();
    if ($exist != null){
        return true;
    }else{
        return false;
    }
}

function getLoginHistory()
{
    return LoginHistory::leftJoin('admin_roles', 'admin_roles.id', '=', 'login_histories.admin_id')->orderBy('login_histories.created_at', 'DESC')
        ->select('login_histories.created_at',
            'login_histories.updated_at',
            'admin_roles.name',
            'admin_roles.phone',
        )->limit(10)
        ->get();
}


function getCopyright()
{
    return "Qubit Solution lab";
}


?>
