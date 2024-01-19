<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function list()
    {
        $allAdmin = User::where('role', '=', 1)->where('is_delete', '=',0)->orderBy('id', 'DESC')->paginate(10);
        $data['header_title']='admin List';
     return view('admin.admin.list', compact('allAdmin'),$data);
    }
    public function AddNewAdmin(){
        $data['header_title']='Add New Admin';
        return view('admin.admin.add',$data);
    }
    public function store(Request $request){
        $this->validate($request,[
            'email'=>'required|unique:users,email',
          ]);
        $user =new User;
        $user->name=trim($request->name);
        $user->email=trim($request->email);
        $user->role=1;
        $user->password= Hash::make($request->password);
        $user->save();
        return redirect('admin/admin/list')->with('success','Admin Successfully Created');

    }
    public function Edit($id){
        $singleUser=User::find($id);
        $data['header_title']='Edit admin';
        return view('admin.admin.edit',compact('singleUser'),$data);
    }

    public function Update(Request $request,$id){
        $this->validate($request,[
            'email'=>'required|unique:users,email,.$id',
        ]);
        $user =User::find($id);
        $user->name=trim($request->name);
        $user->email=trim($request->email);
        if(!empty($request->password)){
        $user->password= Hash::make($request->password);
        }
        $user->save();
        return redirect('admin/admin/list')->with('success','Admin Updated Successfully ');

    }
    public function Delete($id){
        $delete =User::find($id);
        $delete->is_delete=1;
        $delete->save();
        return redirect('admin/admin/list')->with('success','Admin Deleted Successfully ');

    }

}
