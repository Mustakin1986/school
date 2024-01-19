<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function List()
    {
      $data['getTeacher']=User::getTeacher();
      $data['header_title']='Teacher List';
      return view('admin.teacher.list',$data);
     }
     public function Add()
     {
        $data['header_title']='Add New Teacher';
        return view('admin.teacher.add',$data);
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
       $teacher = new User;
       $teacher->name=trim($request->name);
       $teacher->last_name=trim($request->last_name);
       $teacher->qualification=trim($request->qualification);
       $teacher->Work_experience=trim($request->Work_experience);
       $teacher->gender=trim($request->gender);
       $teacher->date_of_birth=trim($request->date_of_birth);
       $teacher->date_of_joining=trim($request->date_of_joining);
       $teacher->mobile_number=trim($request->mobile_number);
       $teacher->address=trim($request->address);
       $teacher->permanent_address=trim($request->permanent_address);
       $teacher->image= $image;
       $teacher->role=2;
       $teacher->note=trim($request->note);
       $teacher->marital_status=trim($request->marital_status);
       $teacher->status=trim($request->status);
       $teacher->email=trim($request->email);
       $teacher->password= Hash::make($request->password);
       $teacher->save();
       return redirect('admin/teacher/list')->with('success','Teacher Add Successfully');

    }
    public function Delete($id){
        $delete =User::find($id);
        $delete->is_delete=1;
        $delete->save();
        return redirect('admin/teacher/list')->with('success','Teacher Deleted Successfully ');

    }
}
