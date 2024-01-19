<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\classModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function MyAccount()
    {
        $data['getRecode']=User::getSingle(Auth::user()->id);
        $data['getClass']=classModel::getClass();
        $data['header_title']='My Account';
        if(Auth::user()->role==2){
            return view('teacher.my_account',$data);
        }
        else if(Auth::user()->role==3)
        {
            return view('student.my_account',$data);
        }elseif(Auth::user()->role==4)
        {
            return view('parent.my_account',$data);
        }

    }
    public function UpdateMyAccount(Request $request)
    {
        $id = Auth::user()->id;

        $this->validate($request, [
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $teacher = User::getSingle($id);

        if (isset($request->image)) {
            if ($teacher->image && file_exists(public_path('/Profile/' . $teacher->image))) {
                unlink(public_path('/Profile/' . $teacher->image));
            }

            $updateImage = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/Profile/'), $updateImage);
            $teacher->image = $updateImage;
        }

        // Update other fields
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->qualification = trim($request->qualification);
        $teacher->Work_experience = trim($request->Work_experience);
        $teacher->gender = trim($request->gender);
        $teacher->date_of_birth = trim($request->date_of_birth);
        $teacher->date_of_joining = trim($request->date_of_joining);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->address = trim($request->address);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->role = 2;
        $teacher->note = trim($request->note);
        $teacher->marital_status = trim($request->marital_status);
        $teacher->status = trim($request->status);
        $teacher->email = trim($request->email);
        $teacher->save();

        return redirect()->back()->with('success', 'Profile Update Successfully');
    }
    public function UpdateStudentMyAccount(Request $request)
    {
        $id = Auth::user()->id;

        $this->validate($request, [
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $student = User::getSingle($id);

        if (isset($request->image)) {
            if ($student->image && file_exists(public_path('/Profile/' . $student->image))) {
                unlink(public_path('/Profile/' . $student->image));
            }

            $updateImage = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/Profile/'), $updateImage);
            $student->image = $updateImage;
        }

        // Update other fields
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_no = trim($request->roll_no);
        $student->gender = trim($request->gender);
        $student->date_of_birth = trim($request->date_of_birth);
        $student->class_id = trim($request->class_id);
        $student->mobile_number = trim($request->mobile_number);
        $student->religion = trim($request->religion);
        $student->admission_date = trim($request->admission_date);
        $student->role = 3;
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->save();

        return redirect()->back()->with('success', 'Profile Update Successfully');
    }
    public function UpdateParentMyAccount(Request $request)
    {
        $id = Auth::user()->id;

        $this->validate($request, [
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $parent = User::getSingle($id);

        if (isset($request->image)) {
            if ($parent->image && file_exists(public_path('/Profile/' . $parent->image))) {
                unlink(public_path('/Profile/' . $parent->image));
            }

            $updateImage = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/Profile/'), $updateImage);
            $parent->image = $updateImage;
        }

        // Update other fields
        $parent->name=trim($request->name);
        $parent->last_name=trim($request->last_name);
        $parent->occupation=trim($request->occupation);
        $parent->address=trim($request->address);
        $parent->gender=trim($request->gender);
        $parent->mobile_number=trim($request->mobile_number);
        $parent->role=4;
        $parent->status=trim($request->status);
        $parent->email=trim($request->email);
        $parent->save();
        return redirect()->back()->with('success','Update Successfully');
    }

}

