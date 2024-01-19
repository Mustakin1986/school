<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\ClassWiseSubject;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
      public function List(){
        $allSubject = Subject::where('status', '=',0)->orderBy('id', 'DESC')->paginate(10);
        $data['header_title']='subject List';
        return view('admin.subject.list',compact('allSubject') , $data);
       }

       public function Add(){
        $data['header_title']='Add Subject';
        return view('admin.subject.add',$data);
       }
       public function store( Request $request){
        $this->validate($request,[
            'name'=>'required|unique:subjects,name',
          ]);
        $subject =new Subject;
        $subject->name=trim($request->name);
        $subject->type=trim($request->type);
        $subject->created_by=Auth::user()->id;
        $subject->status=trim($request->status);
        $subject->save();
        return redirect('admin/subject/list')->with('success','Subject Added Successfully');
       }
       public function Delete($id){
        $delete =Subject::find($id);
        $delete->delete();
        return redirect('admin/subject/list')->with('success','subject Deleted Successfully ');

       }
      //student Side
     public function my_subject(){
                $data['mySubject']= ClassWiseSubject::mySubject(Auth::user()->class_id);
                $data['header_title']='subject List';
                return view('student.my_subject', $data);
     }
    //parent side
     public function MySonSubject($son_id){
                $user= User::getSingle($son_id);
                $data['getUser']=$user;
                $data['MySonSubject']= ClassWiseSubject::mySubject($user->class_id);
                $data['header_title']='subject List';
                return view('parent.my_son_subject', $data);
     }
}
