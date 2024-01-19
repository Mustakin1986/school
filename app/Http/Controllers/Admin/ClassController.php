<?php

namespace App\Http\Controllers\Admin;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
     public function List(){
    $data['getClass']= ClassModel::getClass();
    $data['header_title']='Class List';
    return view('admin.Class.list', $data);
   }
   public function AddClass(){
       $data['header_title']='Add Class';
       return view('admin.Class.add',$data);
   }
   public function store( Request $request){
    $this->validate($request,[
        'name'=>'required|unique:class_models,name',
      ]);
    $Class =new ClassModel;
    $Class->name=trim($request->name);
    $Class->created_by=Auth::user()->id;
    $Class->status=trim($request->status);
    $Class->save();
    return redirect('admin/Class/list')->with('success','Class Added Successfully');
   }
   public function Edit($id){
    $SingleClass=ClassModel::find($id);
    $data['header_title']=' ClassEdit ';
    return view('admin/Class/Edit',compact('SingleClass'),$data);
   }
   public function Delete($id){
    $delete =ClassModel::find($id);
    $delete->is_delete=1;
    $delete->save();
    return redirect('admin/Class/list')->with('success','Class Deleted Successfully ');

   }
}

