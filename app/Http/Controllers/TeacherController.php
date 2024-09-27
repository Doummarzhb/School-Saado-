<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class TeacherController extends Controller
{
    //
    public function list()
    {
        $data['getRecord'] = User::getTeacher();
        $data['header_title'] = "Teacher List";
        return view('admin.teacher.list', $data);
    }


    public function add()
    {

        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Add New Teacher";
        return view('admin.teacher.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'mobile_number'=>'max:15|min:8',

        ]);
        $teacher = new User;
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);
        // $teacher->marital_status = $request->marital_status !== null ? trim($request->marital_status) : $teacher->marital_status;
        $teacher->marital_status = !empty($request->marital_status) ? trim($request->marital_status) : 0;



        $teacher->permanent_address = trim($request->permanent_address);

        if (!empty($request->date_of_birth)) {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }
        if(!empty($request->admission_date))
        {
        $teacher->admission_date = trim($request->admission_date);

        }
        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
             $file = $request->file('profile_pic');
             $randomStr =date('Ymdhis').Str::random(20);
             $filename = strtolower( $randomStr).'.'.$ext;
             $file->move('upload/profile/',$filename);

             $teacher->profile_pic = $filename;

        }

        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->status = trim($request->status);
        $teacher->email = trim($request->email);
        $teacher->password = Hash::make($request->password);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->note = trim($request->note);
        $teacher->address = trim($request->address);
        $teacher->user_type = 2;
        $teacher->save();

        return redirect('admin/teacher/list')->with('success', "teacher Successfully Created");
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'mobile_number' => 'max:15|min:8',
            'marital_status' => 'nullable|in:0,1'
        ]);

        $teacher = User::getSingle($id);
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);

        // $teacher->marital_status = $request->marital_status !== null ? trim($request->marital_status) : $teacher->marital_status;
        $teacher->marital_status = !empty($request->marital_status) ? trim($request->marital_status) : 0;




        if (!empty($request->date_of_birth)) {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }

        if (!empty($request->file('profile_pic'))) {
            if (!empty($teacher->getProfile())) {
                unlink('upload/profile/' . $teacher->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $filename);

            $teacher->profile_pic = $filename;
        }

        $teacher->mobile_number = trim($request->mobile_number);

        if (!empty($request->admission_date)) {
            $teacher->admission_date = trim($request->admission_date);
        }

        $teacher->address = trim($request->address);
        $teacher->permanent_address = trim($request->permanent_address);

        $teacher->work_experience = trim($request->work_experience);
        $teacher->note = trim($request->note);
        $teacher->qualification = trim($request->qualification);
        $teacher->status = trim($request->status);
        $teacher->email = trim($request->email);

        if (!empty($request->password)) {
            $teacher->password = Hash::make($request->password);
        }

        $teacher->save();

        return redirect('admin/teacher/list')->with('success', "Teacher Successfully Updated");
    }



    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['getClass'] = ClassModel::getClass();
            $data['header_title'] = "Edit  Teacher";
            return view('admin.teacher.edit', $data);
        }
        else
        {
            abort(404);
        }

    }
    public function delete($id)
    {
        $getRecord = User::getSingle($id);
        if($getRecord)
        {
            $getRecord->is_delete = 1;
            $getRecord->save();

            return redirect()->back()->with('success', "Teacher Successfully Deleted");


        }
        else
        {
            abort(404);
        }

    }
}
