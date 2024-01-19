<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
      public function List()
      {
        $data['getStudent']=User::getStudent();
        $data['header_title']='Student List';
        return view('admin.student.list',$data);
       }
       public function Add(){
        $data['header_title']='Add New Student';
        $data['getClass']=classModel::getClass();
        return view('admin.student.add',$data);
       }
        public function store(Request $request)
        {
        $this->validate($request,[
            'email'=>'required|unique:users,email',
          ]);

          if ($request->file('image')) {
            $image = time() . '.' . $request->image->extension();
            $path = $request->image->move(public_path('/Profile/'), $image);
        }
        $student = new User;
        $student->name=trim($request->name);
        $student->last_name=trim($request->last_name);
        $student->admission_number=trim($request->admission_number);
        $student->roll_no=trim($request->roll_no);
        $student->class_id=trim($request->class_id);
        $student->gender=trim($request->gender);
        $student->date_of_birth=trim($request->date_of_birth);
        $student->religion=trim($request->religion);
        $student->mobile_number=trim($request->mobile_number);
        $student->admission_date=trim($request->admission_date);
        $student->image= $image;
        $student->role=3;
        $student->blood_group=trim($request->blood_group);
        $student->height=trim($request->height);
        $student->weight=trim($request->weight);
        $student->status=trim($request->status);
        $student->email=trim($request->email);
        $student->password= Hash::make($request->password);
        $student->save();
        return redirect('admin/student/list')->with('success','Student Add Successfully');

    }

    public function Delete($id){
        $delete =User::find($id);
        if($delete){
        $imageDelete = public_path('/Profile/'.$delete->image);
        if(File::exists($imageDelete)){
            File::delete($imageDelete);
         }
        }
        $delete->delete();
        return redirect('admin/student/list')->with('success','Student Deleted Successfully ');

    }
    // teacher side
    public function MyStudent(){
        $data['getRecord']=User::getTeacherStudent(Auth::user()->id);
        $data['header_title']='my Student';
        return view('teacher.my_student',$data);
    }
}
