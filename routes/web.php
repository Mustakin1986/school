<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\ParentController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\AssignSubjectController;
use App\Http\Controllers\Admin\AssignClassTeacherController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[AuthController::class,'login']);
Route::post('login',[AuthController::class,'AuthLogin']);
Route::get('logout',[AuthController::class,'logout']);


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/admin/admin/list', function () {
    return view('admin.admin.list');
});

Route::group(['middleware' => 'admin'],function(){
        Route::get('admin/dashboard',[DashboardController::class,'dashboard']);
        Route::get('admin/admin/list',[AdminController::class,'list']);
        Route::get('admin/admin/add',[AdminController::class,'AddNewAdmin']);
        Route::post('admin/admin/add',[AdminController::class,'store']);
        Route::get('admin/admin/edit/{id}',[AdminController::class,'Edit']);
        Route::post('admin/admin/update/{id}',[AdminController::class,'Update']);
        Route::get('admin/admin/Delete/{id}',[AdminController::class,'Delete']);

    // class
        Route::get('admin/Class/list',[ClassController::class,'list']);
        Route::get('admin/Class/add',[ClassController::class,'AddClass']);
        Route::post('admin/Class/add',[ClassController::class,'store']);
        Route::get('admin/Class/edit/{id}',[ClassController::class,'Edit']);
        Route::post('admin/Class/update/{id}',[ClassController::class,'Update']);
        Route::get('admin/Class/Delete/{id}',[ClassController::class,'Delete']);
     // subject
        Route::get('admin/subject/list',[SubjectController::class,'list']);
        Route::get('admin/subject/add',[SubjectController::class,'Add']);
        Route::post('admin/subject/add',[SubjectController::class,'store']);
        Route::get('admin/subject/edit/{id}',[SubjectController::class,'Edit']);
        Route::post('admin/subject/update/{id}',[SubjectController::class,'Update']);
        Route::get('admin/subject/Delete/{id}',[SubjectController::class,'Delete']);
     // Assign Subject
        Route::get('admin/assign_subject/list',[AssignSubjectController::class,'list']);
        Route::get('admin/assign_subject/add',[AssignSubjectController::class,'Add']);
        Route::post('admin/assign_subject/add',[AssignSubjectController::class,'store']);
        Route::get('admin/assign_subject/edit/{id}',[AssignSubjectController::class,'Edit']);
        Route::post('admin/assign_subject/update/{id}',[AssignSubjectController::class,'Update']);
        Route::get('admin/assign_subject/Delete/{id}',[AssignSubjectController::class,'Delete']);
      //Assign Class Teacher
        Route::get('admin/assign_class_teacher/list', [AssignClassTeacherController::class, 'list']);
        Route::get('admin/assign_class_teacher/add', [AssignClassTeacherController::class, 'Add']);
        Route::post('admin/assign_class_teacher/add', [AssignClassTeacherController::class, 'store']);
      // student
        Route::get('admin/student/list',[StudentController::class,'list']);
        Route::get('admin/student/add',[StudentController::class,'Add']);
        Route::post('admin/student/add',[StudentController::class,'store']);
        Route::get('admin/student/Delete/{id}',[StudentController::class,'Delete']);
      //parent
        Route::get('admin/parent/list',[ParentController::class,'list']);
        Route::get('admin/parent/add',[ParentController::class,'Add']);
        Route::post('admin/parent/add',[ParentController::class,'store']);
        Route::get('admin/parent/Delete/{id}',[ParentController::class,'Delete']);
        Route::get('admin/parent/my_son/{id}',[ParentController::class,'MySon']);
        Route::get('admin/parent/assign_son_to_parent/{student_id}/{parent_id}',[ParentController::class,'AssignSonParent']);
        Route::get('admin/parent/assign_son_parent_delete/{student_id}',[ParentController::class,'AssignSonParentDelete']);

      //Teacher
        Route::get('admin/teacher/list',[TeacherController::class,'list']);
        Route::get('admin/teacher/add',[TeacherController::class,'Add']);
        Route::post('admin/teacher/add',[TeacherController::class,'store']);
        Route::get('admin/teacher/Delete/{id}',[TeacherController::class,'Delete']);
     });

    Route::group(['middleware' => 'teacher'],function(){
        Route::get('teacher/dashboard',[DashboardController::class,'dashboard']);
        Route::get('teacher/my_account',[UserController::class,'MyAccount']);
        Route::post('teacher/my_account',[UserController::class,'UpdateMyAccount']);
        Route::get('teacher/my_class_subject',[AssignClassTeacherController::class,'myClassSubject']);
        Route::get('teacher/my_student',[StudentController::class,'MyStudent']);
    });

 Route::group(['middleware' => 'student'],function(){
    Route::get('student/dashboard',[DashboardController::class,'dashboard']);
    Route::get('student/my_account',[UserController::class,'MyAccount']);
    Route::post('student/my_account',[UserController::class,'UpdateStudentMyAccount']);
    Route::get('student/my_subject',[SubjectController::class,'my_subject']);
 });
 Route::group(['middleware' => 'parent'],function(){
    Route::get('parent/dashboard',[DashboardController::class,'dashboard']);
    Route::get('parent/my_account',[UserController::class,'MyAccount']);
    Route::post('student/my_account',[UserController::class,'UpdateParentMyAccount']);
    Route::get('parent/my_son',[ParentController::class,'MyAllSon']);
    Route::get('parent/my_son/subject/{son_id}',[SubjectController::class,'MySonSubject']);
 });
