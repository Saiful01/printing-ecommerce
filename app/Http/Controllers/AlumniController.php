<?php

namespace App\Http\Controllers;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use RealRashid\SweetAlert\Facades\Alert;

class AlumniController extends Controller
{

    public function create()
    {

        return view('admin.employee.create');
    }

    public function excelSave(Request $request)
    {
        // return $array = Excel::toArray([], public_path('upload.xlsx'));

        // return $request->all();

        $department_id = $request['department_id'];
        $data = Excel::toArray([], $request->file('excel_file'));

        $i = 0;
        $inserted_item = 0;
        $password = Hash::make("123456");
        $emp_array = [];
        foreach ($data[0] as $item) {
            if ($i != 0) {
                $emp_array = [
                    'name' => $item[13],
                    'business_unit' => $item[1],
                    'position' => $item[2],
                    'zone' => $item[3],
                    'region' => $item[4],
                    'sales_unit' => $item[5],
                    'job_location' => $item[6],
                    'line_manager' => $item[7],
                    'cam_name' => $item[8],
                    'employee_code' => $item[9],
                    'rso_mission' => $item[10],
                    'pool_phone' => $item[11],
                    'response_id' => $item[12],
                    'employee_name' => $item[13],
                    'joining_date' => Date::excelToDateTimeObject($item[14])->format('Y-m-d'),
                    'market_type' => $item[15],
                    'status' => $item[16],
                    'resign_date' => $item[17],
                    'service_tenure' => $item[18],
                    'transfer_from' => $item[19],
                    'transfer_to' => $item[20],
                    'transfer_effective_date' => $item[21],
                    'fixed_salary' => $item[22],
                    'bank_account' => $item[23],
                    'bank_name' => $item[24],
                    'branch_name' => $item[25],
                    'routing_number' => $item[26],
                    'contract_start_date' => Date::excelToDateTimeObject($item[27])->format('Y-m-d'),
                    'contract_end_date' => Date::excelToDateTimeObject($item[28])->format('Y-m-d'),
                    'dob' => Date::excelToDateTimeObject($item[29])->format('Y-m-d'),
                    'nid' => $item[30],
                    'fathers_name' => $item[31],
                    'mothers_name' => $item[32],
                    'phone' => $item[33],
                    'blood_group' => $item[34],
                    'gender' => $item[35],
                    'present_address' => $item[36],
                    'permanent_address' => $item[37],
                    'nominee_name' => $item[38],
                    'nominee_contact' => $item[39],
                    'nominee_nid' => $item[40],
                    'relation_with_nominee' => $item[41],
                    'remarks' => $item[42],
                    'department_id' => $department_id,
                    'admin_id' => Auth::user()->id,

                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'password' => $password,
                ];

                try {
                    User::insert($emp_array);
                    $inserted_item++;
                } catch (\Exception $exception) {
                    // return $exception->getMessage();

                }
            }
            $i++;
        }
        Alert::success('Success! ', $inserted_item . " Number of Employee Created Successfully");
        return back()->with('success', "Successfully Created ");

    }

    public function store(Request $request)
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
        $request['password'] = Hash::make($request['password']);
        $request['name'] = $request['employee_name'];
        //return $request->except(['image']);
        $request['admin_id'] = Auth::user()->id;
        try {

            User::create($request->except(['image']));
            Alert::success('Success! ', "Employee Created Successfully");

            return back()->with('success', "Successfully Created ");
        } catch (\Exception $exception) {
            return $exception->getMessage();
            return back()->with('failed', $exception->getMessage());
        }
    }

    public function show(Request $request)
    {
        $departments = Department::get();

        $query = User::leftJoin('departments', 'users.department_id', '=', 'departments.department_id')
            ->select('users.*', 'departments.department_name');

        if (!Auth::user()->is_admin) {
            $query->where('users.department_id', Auth::user()->department_id);

            if (Auth::user()->is_supervisor) {
                $query->where('users.admin_id', Auth::user()->id);
            }
            //$query->get();
        }

        if ($request->isMethod('post')) {
            $data = $query->where('users.department_id', $request['department_id'])
                ->get();
        } else {
            $data = $query->get();
        }


        return view('admin.employee.show')
            ->with('data', $data)
            ->with('departments', $departments);
    }

    public function operators()
    {
        $data = User::where('user_type', 2)
            ->leftJoin('departments', 'users.department_id', '=', 'departments.department_id')
            ->select('users.*', 'departments.department_name')
            ->get();
        return view('admin.employee.show')->with('data', $data);
    }


    public function edit($id)
    {
        $data = User::where('id', $id)->first();
        $department = Department::all();
        return view('admin.employee.edit')
            ->with('departments', $department)
            ->with('data', $data);
    }

    public function update(Request $request)
    {
        unset($request['_token']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/user');
            $image->move($destinationPath, $image_name);
            $request['profile_pic'] = $image_name;
        }

        if ($request['password'] != null) {
            $request['password'] = Hash::make($request['password']);
        } else {
            unset($request['password']);
        }

        //return $request['id'];
        //return $request->except(['image']);

        try {
            User::where('id', $request['id'])->update($request->except(['image']));
            Alert::success('Success! ', "Employee Updated Successfully");
            return back()->with('success', "Successfully Updated ");
        } catch (\Exception $exception) {
            Alert::error('Failed! ', "There is an error. Try again");
            return back()->with('failed', $exception->getMessage());
        }

    }

    public function changeToOperator($id)
    {


        try {
            User::where('id', $id)->update([
                'user_type' => 2
            ]);
            Alert::success('Success! ', "Operator Updated Successfully");
            return back()->with('success', "Successfully Updated ");
        } catch (\Exception $exception) {
            return $exception->getMessage();
            return back()->with('failed', $exception->getMessage());
        }

    }

    public function destroy($id)
    {
        try {
            User::where('id', $id)->delete();
            Alert::success('Success! ', "Successfully Deleted.");
            return back()->with('success', "Successfully   Deleted ");
        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());

        }
    }

    public function in_out_monitor(User $user, $id)
    {


        $data = InOutMonitor::where('user_id', $id)
            ->get();
        return view('admin.employee.details')->with('datas', $data)
            ->with('id', $id);

    }

    public function out_side_visit(User $user, $id)
    {
        $data = DB::table('users')
            ->join('out_side_visits', 'users.id', '=', 'out_side_visits.user_id')
            ->where('id', $id)
            ->get();
        return view('admin.employee.out_side_visit')->with('data', $data)->with('id', $id);

    }

    public function showLeave($id)
    {
        $data = Leave::where('user_id', $id)
            ->get();
        return view('admin.employee.leave')->with('data', $data)
            ->with('id', $id);
    }

    public function profile($id)
    {
        $data = User::where('id', $id)->first();
        $documents = UserDocument::where('user_id', $id)->first();
        return view('admin.employee.profile')
            ->with('employee', $data)
            ->with('documents', $documents)
            ->with('leave', Leave::where('user_id', $id)
                ->whereYear('created_at', '=', date('Y'))
                ->sum('holiday_count'))
            ->with('id', $id);
    }

    public function createLeave($id)
    {

        return view('admin.leave.create')
            ->with('id', $id);
    }

    public function showReport(Request $request)
    {

        $query = User::where('is_admin', false)
            ->leftJoin('departments', 'users.department_id', '=', 'departments.department_id')
            ->select('users.*', 'departments.department_name');
        if (!Auth::user()->is_admin) {
            $query->where('users.department_id', Auth::user()->department_id)->get();
        }

        $employee = $query->get();

        $now = Carbon::now();
        $countMonth = $now->format('m');
        $countYear = $now->get('year');
        foreach ($employee as $item) {
            $absent = Leave::where('user_id', $item->id)->whereMonth('created_at', $countMonth)->sum('holiday_count');
            $present = InOutMonitor::where('user_id', $item->id)->whereMonth('in_time', $countMonth)->count();
            $item->absent = $absent;
            $item->present = $present;
        }

        return view('admin.report.show')->with('data', $employee);
    }

    public function showDetailReport(Request $request)
    {


        // return $present->$countPresent;

        return view('admin.report.show_details_report');
    }

    public function showSearchReport(Request $request)
    {
        $from_date = $request['from'] . ' 00:00:00';
        $to_date = $request['to'] . " 23:59:59";


        //   return   $from_date = Carbon::getFormatteddate($request['from_date']);
        //     $to_date = Carbon::getFormatteddate($request['to_date']);
        $employee = User::where('is_admin', false)->get();

        foreach ($employee as $item) {
            $absent = Leave::where('user_id', $item->id)->whereBetween('created_at', [$from_date, $to_date])->sum('holiday_count');
            $present = InOutMonitor::where('user_id', $item->id)->whereBetween('in_time', [$from_date, $to_date])->count();
            $item->absent = $absent;
            $item->present = $present;

        }


        // return $present->$countPresent;

        return view('admin.report.show')->with('data', $employee)
            ->with('from_date', $from_date)
            ->with('to_date', $to_date);
    }

    public function showDetailSearchReport(Request $request)
    {

        $month = date('m', strtotime($request['month']));
        $year = date('Y', strtotime($request['month']));
        $d = Carbon::create($year, $month)->daysInMonth;
        $phone_number = $request['phone'];

        // $designation = User::where('phone',$phone_number)->get('designation');

        $query = User::where('is_admin', false);
        if (!Auth::user()->is_admin) {
            $query->where('users.department_id', Auth::user()->department_id)->get();
        }


        $data = $query->get();
        // count($data);

        // return $request;
        return view('admin.report.show_details_report')
            ->with('day', $d)
            ->with('month_year', $request['month'])
            ->with('datas', $data);
    }

    public function viewDocument($id, $type)
    {

        return $type;


    }


}
