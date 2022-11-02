<?php


use App\Models\BlogCategory;
use App\Models\CustomerAddress;
use App\Models\Department;
use App\Models\InOutMonitor;
use App\Models\Leave;
use App\Models\LoginHistory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

function getErrorMessage($param)
{
    return $param;
}
function getBlogCategories()
{
    return BlogCategory::all();
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


function getTimeOnly($date)
{
    return Carbon::createFromFormat('H:i:s', $date)->format('h:i:s');
}
function isAddress()
{
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

function getDummyNews()
{
    return "Quisque elementum nibh at dolor pellentesque, a eleifend libero pharetra. Mauris neque felis, volutpat nec ullamcorper eget, sagittis vel enim. Nam sit amet ante egestas, gravida tellus vitae, semper eros. Nullam mattis mi at metus egestas, in porttitor lectus sodales. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate laborum vero voluptatum.

Lorem quasi aliquid maiores iusto suscipit perspiciatis a aspernatur et fuga repudiandae deleniti excepturi nesciunt animi reprehenderit similique sit. ipsum dolor sit amet, consectetur adipisicing elit. Qui at laborum nulla quae quibusdam molestias earum suscipit dolorum debitis hic sint asperiores maxime deserunt neque explicabo molestiae autem totam illum?

Maecenas semper aliquam massa. Praesent pharetra sem vitae nisi eleifend molestie. Aliquam molestie scelerisque ultricies. Suspendisse potenti. Phasellus interdum risus at mi ullamcorper lobortis. In et metus aliquet, suscipit leo.

Donec sed tincidunt lacus. Duis vehicula aliquam vestibulum. Aenean at mollis mi. Cras ac urna sed nisi auctor venenatis ut id sapien. Vivamus commodo lacus lorem, a tristique sapien tempus non. Donec fringilla cursus porttitor. Morbi quis massa id mi pellentesque placerat. Nam scelerisque sit amet diam id blandit. Nullam ultrices ligula at ligula tincidunt, sit amet aliquet mi pellentesque. Aenean eget fermentum risus. Aenean eu ultricies nulla, id bibendum libero. Vestibulum dui augue, malesuada nec tellus vel, egestas condimentum ipsum. Vestibulum ut.

Integer semper quam turpis, id dapibus nunc ultrices at. Vestibulum eget orci lobortis, imperdiet diam a, ornare eros. Nam porttitor rutrum massa, eu varius velit facilisis at. Quisque porta elit et viverra suscipit. Proin laoreet, nisl et auctor mollis, felis sapien aliquet felis, nec facilisis tellus enim vitae enim. Nam rhoncus enim diam, a consequat nisi bibendum pulvinar. Donec aliquam lectus vitae ante pulvinar facilisis. Curabitur sed sem est.";
}


?>
