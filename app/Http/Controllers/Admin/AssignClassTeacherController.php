<?php

namespace App\Http\Controllers\Admin;

use Log;
use Exception;
use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Models\AssignClassTeacher;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AssignClassTeacherController extends Controller
{
   public function list(){
    $data['getTeacher']=AssignClassTeacher::getTeacher();
    $data['header_title']='Assign Class Teacher';
    return view('admin.assign_class_teacher.list',$data);
   }
   public function Add()
   {
    $data['getTeacher']=User::getTeacherClass();
    $getClass=ClassModel::where('is_delete', '=',0)->orderBy('id', 'DESC')->get();
    $data['header_title']='Assign Class Teacher';
    return view('admin.assign_class_teacher.add',compact('getClass'),$data);
   }
   public function store(Request $request)
   {
    if (!empty($request->teacher_id))
       {
        foreach ($request->teacher_id as $teacher_id)
            {
                $getAlreadyFirst= AssignClassTeacher::getAlreadyFirst($request->class_id,$teacher_id);
                if(!empty( $getAlreadyFirst)){
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                }else{
                    $data = new AssignClassTeacher;
                    $data->class_id= $request->class_id ;
                    $data->teacher_id = $teacher_id; // Use $subject_id from the loop
                    $data->created_by = Auth::user()->id; // Use Auth::user() instead of Auth::User()
                    $data->status = $request->status;
                    $data->save();
                }

            }
        return redirect('admin/assign_class_teacher/list')->with('success', 'Assign Teacher Successfully');
        } else {
            return redirect()->back()->with('error', 'Due to some error please try again');
        }
   }

   public function myClassSubject()
   {
        $data['getRecord']=AssignClassTeacher::getMyClassSubject(Auth::user()->id);
        $data['header_title']='Teacher Class & Subject';
        return view('teacher.my_class_subject',$data);
   }




}


