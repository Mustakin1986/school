<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassWiseSubject extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    public function classModel()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    static public function getAlreadyFirst($class_id,$subject_id){
    return self::where('class_id','=',$class_id)->where('subject_id','=',$subject_id)->first();
    }

    static public function mySubject($class_id){
        $query=self::select('class_wise_subjects.*','subjects.name as subject_name','class_models.name as class_name ','subjects.type as subject_type')
                ->join('subjects','subjects.id','class_wise_subjects.subject_id','left')
                ->join('class_models','class_models.id','class_wise_subjects.class_id','left')
                ->where('class_wise_subjects.class_id','=',$class_id)
                ->where('class_models.is_delete','=',0)
                ->where('class_models.status','=',0)
                ->orderBy('class_wise_subjects.id','asc')
                ->get();
        return $query;
    }
}
