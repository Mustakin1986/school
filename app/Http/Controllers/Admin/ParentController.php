<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ParentController extends Controller
{
    public function list()
    {
        $allParent = User::where('role', '=', 4)->where('is_delete', '=',0)->orderBy('id', 'DESC')->paginate(10);
        $data['header_title']='Parent List';
        return view('admin.parent.list', compact('allParent'),$data);
    }
     public function Add(){
        $data['header_title']='Add New parent';
        return view('admin.parent.add',$data);
       }
       public function store(Request $request){
        $this->validate($request,[
            'email'=>'required|unique:users,email',
          ]);

          if ($request->file('image')) {
            $image = time() . '.' . $request->image->extension();
            $path = $request->image->move(public_path('/Profile/'), $image);
        }
        $parent = new User;
        $parent->name=trim($request->name);
        $parent->last_name=trim($request->last_name);
        $parent->occupation=trim($request->occupation);
        $parent->address=trim($request->address);
        $parent->gender=trim($request->gender);
        $parent->mobile_number=trim($request->mobile_number);
        $parent->image= $image;
        $parent->role=4;
        $parent->status=trim($request->status);
        $parent->email=trim($request->email);
        $parent->password= Hash::make($request->password);
        $parent->save();
        return redirect('admin/parent/list')->with('success','Parent Add Successfully');
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
        return redirect('admin/parent/list')->with('success','Parent Deleted Successfully ');

    }
    public function MySon($id){
        $data['getParent']=User::getSingle($id);
        $data['parent_id']=$id;
        $data['getSearchStudent'] = User::getSearchStudent();
        $data['getMySon'] = User::getMySon($id);
        $data['header_title']='Parent Son List';
        return view('admin.parent.my_son',$data);
    }
    public function AssignSonParent($student_id, $parent_id)
    {
           $student=User::getSingle($student_id);
           $student->parent_id= $parent_id;
           $student->save();
           return redirect()->back()->with('success','Son Successfully Assign ');
    }
    public function AssignSonParentDelete($student_id)
    {
        $student=User::getSingle($student_id);
        $student->parent_id=null;
        $student->save();
        return redirect()->back()->with('success','Student Deleted Successfully');
    }

    public function MyAllSon(){
        $id=Auth::user()->id;
        $data['getMySon'] = User::getMySon($id);
        $data['header_title']='Parent Son List';
        return view('parent.my_son',$data);
    }
}
