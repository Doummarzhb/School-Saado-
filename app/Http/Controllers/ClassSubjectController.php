<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ClassSubjectController extends Controller
{


    //
    public function list(Request $request)
    {

        $class_name = $request->get('class_name');
        $subject_name = $request->get('subject_name');
        $date = $request->get('date');

        $data['getRecord'] = ClassSubjectModel::getRecord($class_name, $subject_name, $date);
        $data['header_title'] = "Class Assign Subject List";

        return view('admin.assign_subject.list', $data);
    }
    public function add()
    {
        $data['getClass']=ClassModel::getClass();
        $data['getSubject']=SubjectModel::getSubject();
        $data['header_title'] ="Add New Assign Subject";
        return view('admin.assign_subject.add',$data);
    }
    public function insert(Request $request)
    {

        if(!empty($request->subject_id))
        {
            foreach ($request->subject_id as $subject_id) {
                $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id , $subject_id);

                if(!empty($getAlreadyFirst))
                {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                }
                else
                {
                    $save = new  ClassSubjectModel;
                    $save->subject_id = $subject_id;
                    $save->class_id = $request->class_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }

            }
            return redirect('admin/assign_subject/list')->with('success', 'Subject Successfully Assigned to Class');

        }
        else
        {
            return redirect()->back()->with('error','Do to some error , please try again  ');
        }

    }

    public function edit($id)
{
    $getRecord = ClassSubjectModel::find($id);
    if (!empty($getRecord)) {
        $data['getRecord'] = $getRecord;
        $data['getAssignSubjectID'] = ClassSubjectModel::getAssignSubjectID($getRecord->class_id); // Call static method
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = SubjectModel::getSubject();
        $data['header_title'] = "Edit Assign Subject";
        return view('admin.assign_subject.edit', $data);
    } else {
        abort(404);
    }
}

    public function delete($id)
    {
        // Use the current instance of the controller to call getSingle
        $save = self::getSingle($id);

        if ($save) {
            // Mark the record as deleted
            $save->is_delete = 1;
            $save->save();
            return redirect()->back()->with('success', 'Record Successfully Deleted');
        } else {
            return redirect()->back()->with('error', 'Record not found.');
        }
    }
    static public function getSingle($id)
    {

         return ClassSubjectModel::find($id);
    }

    public function update(Request $request)
    {
        ClassSubjectModel::deleteSubject($request->class_id);

        if(!empty($request->subject_id))
        {
            foreach ($request->subject_id as $subject_id) {
                $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id , $subject_id);

                if(!empty($getAlreadyFirst))
                {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                }
                else
                {
                    $save = new  ClassSubjectModel;
                    $save->subject_id = $subject_id;
                    $save->class_id = $request->class_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }

            }


        }
        return redirect('admin/assign_subject/list')->with('success', 'Subject Successfully Assigned to Class');
    }
    public function edit_single($id)
    {
        $getRecord = ClassSubjectModel::find($id);
        if ($getRecord) {
            $data['getRecord'] = $getRecord;
            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = SubjectModel::getSubject();
            $data['header_title'] = "Edit Assign Subject";
            return view('admin.assign_subject.edit_single', $data);
        } else {
            abort(404);
        }
    }




    public function update_single($id, Request $request)
    {
        // Ensure `subject_id` is an array
        $subject_ids = (array) $request->subject_id;

        foreach ($subject_ids as $subject_id) {
            $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $subject_id);

            if (!empty($getAlreadyFirst)) {
                $getAlreadyFirst->status = $request->status;
                $getAlreadyFirst->save();
                return redirect('admin/assign_subject/list')->with('success', 'Status Successfully Updated');
            } else {
                $save = ClassSubjectModel::find($id);

                if (!$save) {
                    return redirect()->back()->with('error', 'Record not found');
                }

                $save->subject_id = $subject_id;
                $save->class_id = $request->class_id;
                $save->status = $request->status;
                $save->created_by = Auth::user()->id;
                $save->save();
            }
        }

        return redirect('admin/assign_subject/list')->with('success', 'Subjects Successfully Processed');
    }


}
//doummar
