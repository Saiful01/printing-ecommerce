<?php

namespace App\Http\Controllers;

use App\Models\AdminRole;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminRoleController extends Controller
{

    public function create()
    {
        $departments = Department::get();
        return view('admin.role.create')
            ->with('departments', $departments);
    }

    public function store(Request $request)
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

        if ($request['department_id'] == null) {
            $request['is_admin'] = true;
        } else {
            $request['is_admin'] = false;
        }


        try {
            AdminRole::create($request->except(['image']));
            Alert::success('Success! ', "Admin Created Successfully");
            return back()->with('success', "Successfully Updated ");
        } catch (\Exception $exception) {
            Alert::error('Failed! ', "There is an error. Try again");
            return back()->with('failed', $exception->getMessage());
        }

    }

    public function show()
    {
        $data = AdminRole::where('department_id', Auth::user()->department_id)->get();
        return view('admin.role.show')->with('data', $data);

    }


    public function edit($id)
    {
        $data = AdminRole::where('id', $id)->first();
        $departments = Department::get();
        return view('admin.role.edit')
            ->with('data', $data)
            ->with('departments', $departments);
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

        if ($request['department_id'] == null) {
            $request['is_admin'] = true;
        } else {
            $request['is_admin'] = false;
        }

        //return $request['id'];


        try {
            AdminRole::where('id', $request['id'])->update($request->except(['image']));
            Alert::success('Success! ', "Admin Updated Successfully");
            return back()->with('success', "Successfully Updated ");
        } catch (\Exception $exception) {
            Alert::error('Failed! ', "There is an error. Try again");
            return back()->with('failed', $exception->getMessage());
        }

    }


    public function destroy($id)
    {
        try {
            AdminRole::where('id', $id)->delete();
            Alert::success('Success! ', "Admin Deleted Successfully");
            return back();
        } catch (\Exception $exception) {
            Alert::error('Failed! ', "There is an error. Try again");
            return back()->with('failed', $exception->getMessage());
        }
    }
}
