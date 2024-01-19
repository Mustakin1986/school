<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignClassTeacher extends Model
{
    use HasFactory;
    protected $table = 'assign_class_teachers';
    protected $guarded = [];

    static public function getAlreadyFirst($class_id,$teacher_id)
      {
        return self::where('class_id','=',$class_id)->where('teacher_id','=',$teacher_id)->first();

        }
        static public function getTeacher()
        {
            $query = self::select('assign_class_teachers.*', 'users.name as teacher_name', 'class_models.name as class_name')
                ->Join('users', 'users.id', '=', 'assign_class_teachers.teacher_id','left')
                ->Join('class_models', 'class_models.id', '=', 'assign_class_teachers.class_id','left')
                ->where('assign_class_teachers.status', '=', 0)
                ->orderBy('assign_class_teachers.id', 'asc')
                ->get();

            return $query;
        }
        static public function getMyClassSubject($teacher_id){
            $query = self::select('assign_class_teachers.*','class_models.name as class_name','subjects.name as subject_name','subjects.type as class_type')
                ->Join('class_models', 'class_models.id', '=', 'assign_class_teachers.class_id','left')
                ->Join('class_wise_subjects', 'class_wise_subjects.class_id', '=', 'class_models.id')
                ->Join('subjects', 'subjects.id', '=', 'class_wise_subjects.subject_id')
                ->where('assign_class_teachers.status', '=', 0)
                ->where('assign_class_teachers.teacher_id', '=',$teacher_id)
                ->orderBy('assign_class_teachers.id', 'asc')
                ->get();

         return $query;
        }

}
