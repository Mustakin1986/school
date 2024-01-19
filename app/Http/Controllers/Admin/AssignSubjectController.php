<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Models\ClassWiseSubject;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AssignSubjectController extends Controller
{
    public function list()
    {
        $allSubjects = ClassWiseSubject::with(['subject', 'classModel'])->where('is_delete', '=',0)->paginate(10);
        $data['header_title']='admin List';
        return view('admin.assign_subject.list',compact('allSubjects'),$data);
    }
    public function Add(){
        $data['header_title']='Assign Subject';
        $getAllSubject=Subject::get();
        $getClass=ClassModel::where('is_delete', '=',0)->orderBy('id', 'DESC')->get();
        return view('admin.assign_subject.add', compact('getAllSubject','getClass'),$data);
    }
    public function store(Request $request) {
        if (!empty($request->subject_id))
        {
            foreach ($request->subject_id as $subject_id)
            {
                $getAlreadyFirst= ClassWiseSubject::getAlreadyFirst($request->class_id,$subject_id);
                if(!empty( $getAlreadyFirst)){
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                }else{
                    $data = new ClassWiseSubject;
                    $data->class_id= $request->class_id ;
                    $data->subject_id = $subject_id; // Use $subject_id from the loop
                    $data->created_by = Auth::user()->id; // Use Auth::user() instead of Auth::User()
                    $data->status = $request->status;
                    $data->save();
                }

            }
            return redirect('admin/assign_subject/list')->with('success', 'Class Assign Successfully');
        } else {
            return redirect()->back()->with('error', 'Due to some error please try again');
        }
    }
    public function Delete($id){
        $delete =ClassWiseSubject::find($id);
        $delete->is_delete=1;
        $delete->save();
        return redirect('admin/assign_subject/list')->with('success','Class Deleted Successfully ');

    }
}
