<?php

namespace App\Http\Controllers;


use App\Models\EmployeeLoginHistory;
use App\Models\InOutMonitor;
use App\Models\Leave;
use App\Models\Message;
use App\Models\OutSideVisit;
use App\Models\User;
use App\Models\UserDocument;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{

    public function loginUsingId(Request $request)
    {
        $token = $request['access_token'];
        $user_document = \response()->json(null);
        $credentials = $request->only('response_id', 'password');

        if (Auth::guard('web')->attempt($credentials)) {

            $status_code = 200;
            $message = "Successfully Logged in";

            $data = Auth::guard('web')->user();
            try {
                EmployeeLoginHistory::create([
                    'ip_address' => "",
                    'employee_id' => Auth::guard('web')->id()
                ]);
            } catch (\Exception $exception) {
                // return
            }

            $user_document = UserDocument::where('user_id', Auth::guard('web')->id())->first();
            if (is_null($user_document)) {
                $user_document = \response()->json(null);
            }


        } else {
            $status_code = 400;
            $message = "Email or password is wrong";
            $data = \response()->json(null);
        }

        return [
            'status_code' => $status_code,
            'message' => $message,
            'access_token' => "",
            'data' => $data,
            'documents' => $user_document,
        ];

    }

    public function login(Request $request)
    {
        $token = $request['access_token'];
        $user_document = [];
        $credentials = $request->only('phone', 'password');
        if (Auth::guard('web')->attempt($credentials)) {

            $status_code = 200;
            $message = "Successfully Logged in";

            $data = Auth::guard('web')->user();
            try {
                EmployeeLoginHistory::create([
                    'ip_address' => "",
                    'employee_id' => Auth::guard('web')->id()
                ]);
            } catch (\Exception $exception) {
                // return
            }

            $user_document = UserDocument::where('user_id', Auth::guard('web')->id())->first();

        } else {
            $status_code = 400;
            $message = "Email or password is wrong";
            $data = null;
        }

        return [
            'status_code' => $status_code,
            'message' => $message,
            'access_token' => "",
            'data' => $data,
            'documents' => $user_document,
        ];

    }

    public function getInOutData(Request $request)
    {

        $token = $request['access_token'];
        $status_code = 200;
        $message = "Successfully Data Retrieved";

        $result = InOutMonitor::where('user_id', $request['user_id'])
            ->orderBy('created_at', 'DESC')
            ->whereYear('created_at', date('Y-m'))
            ->whereMonth('created_at', date('m'))
            ->get();
        $array = [];
        $item = [];
        foreach ($result as $data) {
            $createdAt = Carbon::parse($data->created_at);
            $item['created_at'] = $createdAt->format('d M, Y');

            $inTime = Carbon::parse($data->in_time);
            $item['in_time'] = $inTime->format('g:i A');


            if ($data->out_time != null) {
                $outTime = Carbon::parse($data->out_time);
                $item['out_time'] = $outTime->format('g:i A');
            } else {
                $item['out_time'] = "-";
            }


            $item['in_time_gps'] = $data->in_time_gps;
            $item['in_time_address'] = $data->in_time_address;

            $item['out_time_gps'] = $data->out_time_gps;
            $item['out_time_address'] = $data->out_time_address;


            $array[] = $item;
        }
        return [
            'status_code' => $status_code,
            'message' => $message,
            'access_token' => "",

            'data' => $array,
        ];

    }


    public function getOutSideData(Request $request)
    {

        $token = $request['access_token'];
        $status_code = 200;
        $message = "Successfully Data Retrieved";

        $data = OutSideVisit::where('user_id', $request['user_id'])
            ->orderBy('created_at', 'DESC')
            ->get();

        foreach ($data as $item) {
            $createdAt = Carbon::parse($item->created_at);
            $item['date'] = $createdAt->format('d M, Y g:i A');
        }
        return [
            'status_code' => $status_code,
            'message' => $message,
            'access_token' => "",
            'data' => $data,
        ];

    }


    public function saveInOutDataOld(Request $request)
    {

        $token = $request['access_token'];
        $status_code = 200;
        $message = "Successfully Saved Retrieved";
        $array = [
            'in_time' => Carbon::now(),
            'in_time_gps' => $request['gps'],
            'in_time_address' => $request['address'],
            'user_id' => $request['user_id'],
            'notes' => $request['notes']
        ];

        //$is_in = $request['is_in'];

        $is_exist = InOutMonitor::where('user_id', $request['user_id'])->whereDate('created_at', Carbon::today())->first();
        if (is_null($is_exist)) {
            try {
                $data = InOutMonitor::create($array);
                $message = "Successfully In data Saved";
            } catch (\Exception $exception) {
                $status_code = 400;
                $message = $exception->getMessage();
            }

        } else {
            $array = [
                'out_time' => now(),
                'out_time_gps' => $request['gps'],
                'out_time_address' => $request['address']
            ];

            try {
                $data = InOutMonitor::where('in_out_monitor_id', $is_exist->in_out_monitor_id)->update($array);
                $message = "Successfully Out data Saved";
            } catch (\Exception $exception) {
                $status_code = 400;
                $message = $exception->getMessage();
            }

        }

        return [
            'status_code' => $status_code,
            'message' => $message,
            'access_token' => "",
            'data' => $request->all(),
        ];

    }

    public function saveInOutData(Request $request)
    {

        $token = $request['access_token'];
        $status_code = 200;
        $message = "Successfully Saved Retrieved";
        $array = [
            'in_time' => Carbon::now(),
            'in_time_gps' => $request['gps'],
            'in_time_address' => $request['address'],
            'user_id' => $request['user_id'],
            'notes' => $request['notes']
        ];

        $is_in = $request['is_in'];
        $is_exist = InOutMonitor::where('user_id', $request['user_id'])->whereDate('created_at', Carbon::today())->first();
        if ($is_in == 1) {

            if (is_null($is_exist)) {
                try {
                    $data = InOutMonitor::create($array);
                    $message = "Successfully Checked in";
                } catch (\Exception $exception) {
                    $status_code = 400;
                    $message = $exception->getMessage();
                }

            } else {
                $status_code = 400;
                $message = "Already in";
            }


        } else {
            $array = [
                'out_time' => now(),
                'out_time_gps' => $request['gps'],
                'out_time_address' => $request['address']
            ];

            if (!is_null($is_exist)) {
                try {
                    $data = InOutMonitor::where('in_out_monitor_id', $is_exist->in_out_monitor_id)->update($array);
                    $message = "Successfully Out data Saved";
                } catch (\Exception $exception) {
                    $status_code = 400;
                    $message = $exception->getMessage();
                }
            } else {
                $status_code = 400;
                $message = "Please make sure you are in";
            }

        }

        return [
            'status_code' => $status_code,
            'message' => $message,
            'access_token' => "",
            'data' => $request->all(),
        ];

    }


    public function saveOutSideData(Request $request)
    {

        $token = $request['access_token'];
        $status_code = 200;
        $message = "Successfully Outside Visit Saved";
        $array = [

            'out_side_visit_address' => $request['address'],
            'out_side_visit_gps' => $request['gps'],
            'user_id' => $request['user_id'],
            'notes' => $request['notes']
        ];

        try {
            OutSideVisit::create($array);
            $message = "Successfully outside data Saved";
        } catch (\Exception $exception) {
            $status_code = 400;
            $message = $exception->getMessage();
        }


        return [
            'status_code' => $status_code,
            'message' => $message,
            'access_token' => "",
            'data' => $request->all(),
        ];

    }


    public function saveLeavedata(Request $request)
    {


        $token = $request['access_token'];
        $status_code = 200;
        $message = "Successfully Leave  Saved";


        $from_date = Carbon::parse($request['from_date'])->format('Y-m-d');
        $to_date = Carbon::parse($request['to_date'])->format('Y-m-d');
        $holiday_count = Carbon::parse($from_date)->diffInDays($to_date);

        $array = [
            'from_date' => $from_date,
            'to_date' => $to_date,
            'holiday_count' => $holiday_count,
            'reason' => $request['reason'],
            'user_id' => $request['user_id']
        ];

        try {
            Leave::create($array);
            $message = "Successfully Leave Requested";
        } catch (\Exception $exception) {
            $status_code = 400;
            $message = $exception->getMessage();
        }

        return [
            'status_code' => $status_code,
            'message' => $message,
            'access_token' => "",
            'data' => $request->all(),
        ];

    }


    public function getLeaveData(Request $request)
    {

        $token = $request['access_token'];
        $status_code = 200;
        $message = "Successfully Leave Data Retrieved";

        $data = Leave::where('user_id', $request['user_id'])
            ->whereYear('created_at', date('Y'))
            ->orderBy('created_at', 'DESC')
            ->get();

        $holiday_count = Leave::where('user_id', $request['user_id'])
            ->whereYear('created_at', date('Y'))
            ->where('is_approved', true)
            ->orderBy('created_at', 'DESC')
            ->sum("holiday_count");

        foreach ($data as $item) {


            $item->date = Carbon::parse($request['from_date'])->format('D, d M') . " - " . Carbon::parse($request['to_date'])->format('D, d M');
            if ($item->is_approved == true) {
                $item->status = "Approved";
            } else {
                if ($item->recommend != null) {
                    $item->status = "Recommended";
                } elseif ($item->checked != null) {
                    $item->status = "Checked";
                } elseif ($item->cancel != null) {
                    $item->status = "Cancelled";
                } else {
                    $item->status = "Pending";
                }
            }

        }

        return [
            'status_code' => $status_code,
            'message' => $message,
            'access_token' => "",
            'holiday_count' => $holiday_count,
            'data' => $data
        ];

    }

    public function updateProfile(Request $request)
    {

        $token = $request['access_token'];
        $status_code = 200;
        $message = "Successfully Profile Updated";

        if ($request['password'] == null) {
            $array = [
                'name' => $request['full_name'],
                'email' => $request['email'],
                'phone' => $request['phone_number'],
            ];
        } else {
            $array = [
                'name' => $request['full_name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'password' => Hash::make($request['password'])
            ];
        }

        try {

            User::where('id', $request['user_id'])->update($array);
        } catch (\Exception $exception) {
            $status_code = 201;
            $message = $exception->getMessage();
        }

        return [
            'status_code' => $status_code,
            'message' => $message,
            'access_token' => "",
            'data' => $request->all(),
        ];

    }

    public function message(Request $request)
    {

        $user = User::where('id', $request['user_id'])->first();
        $data = Message::orderBy('created_at', 'DESC')
            ->where('department_id', $user->department_id)
            ->get();

        return [
            'status_code' => 200,
            'message' => "successfully Retrieved",
            'access_token' => "",
            'data' => $data
        ];
    }

    public function saveDocument(Request $request)
    {
        $message = "Success";
        $file_name = "";
        $document_array = [];
        $doc_type = $request['doc_type'];
        $doc_type = str_replace('"', '', $doc_type);
        $is_exist = UserDocument::where('user_id', $request['user_id'])->first();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/documents');
            $file->move($destinationPath, $file_name);
        }
        if ($doc_type == "cv") {
            $document_array = [
                'user_id' => $request['user_id'],
                'cv' => $file_name
            ];
        }
        if ($doc_type == "certificate1") {
            $document_array = [
                'user_id' => $request['user_id'],
                'certificate1' => $file_name
            ];
        }
        if ($doc_type == "certificate2") {
            $document_array = [
                'user_id' => $request['user_id'],
                'certificate2' => $file_name
            ];
        }
        if ($doc_type == "certificate3") {
            $document_array = [
                'user_id' => $request['user_id'],
                'certificate3' => $file_name
            ];
        }
        if ($doc_type == "certificate4") {
            $document_array = [
                'user_id' => $request['user_id'],
                'certificate4' => $file_name
            ];
        }
        if ($doc_type == "certificate5") {
            $document_array = [
                'user_id' => $request['user_id'],
                'certificate5' => $file_name
            ];
        }
        if ($doc_type == "nid") {
            $document_array = [
                'user_id' => $request['user_id'],
                'nid' => $file_name
            ];
        }
        if ($doc_type == "photo") {
            $document_array = [
                'user_id' => $request['user_id'],
                'photo' => $file_name
            ];
        }
        if ($doc_type == "appointment_letter") {
            $document_array = [
                'user_id' => $request['user_id'],
                'appointment_letter' => $file_name
            ];
        }
        if ($doc_type == "nda") {
            $document_array = [
                'user_id' => $request['user_id'],
                'nda' => $file_name
            ];
        }
        if ($doc_type == "nominee_form") {
            $document_array = [
                'user_id' => $request['user_id'],
                'nominee_form' => $file_name
            ];
        }
        if ($doc_type == "nominee_photo") {
            $document_array = [
                'user_id' => $request['user_id'],
                'nominee_photo' => $file_name
            ];
        }
        if ($doc_type == "nominee_nid") {
            $document_array = [
                'user_id' => $request['user_id'],
                'nominee_nid' => $file_name
            ];
        }
        if ($doc_type == "driving_license") {
            $document_array = [
                'user_id' => $request['user_id'],
                'driving_license' => $file_name
            ];
        }
        if ($doc_type == "noc") {
            $document_array = [
                'user_id' => $request['user_id'],
                'noc' => $file_name
            ];
        }
        if ($doc_type == "health_insurance") {
            $document_array = [
                'user_id' => $request['user_id'],
                'health_insurance' => $file_name
            ];
        }
        $document_array['user_id'] = $request['user_id'];


        if (is_null($is_exist)) {
            try {
                UserDocument::create($document_array);
            } catch (\Exception $exception) {
                $message = $exception->getMessage();
            }
        }
        try {
            UserDocument::where('user_id', $request['user_id'])->update($document_array);
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
        }

        $data = UserDocument::where('user_id', $request['user_id'])->first();

        return [
            'status_code' => 200,
            'message' => $message . $request['user_id'] . $doc_type,
            'access_token' => "",
            'data' => $data
        ];
    }
}


