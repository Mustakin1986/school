<?php

namespace App\Models;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassModel extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
    {
     return $this->hasMany(User::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    static public function getClass()
    {
       $query=self::select('class_models.*','users.name as created_by')
                               ->join('users','users.id','class_models.created_by')
                               ->where('class_models.is_delete','=',0)
                               ->where('class_models.status','=',0)
                               ->orderBy('class_models.name','asc')
                               ->paginate(10);
        return $query;
    }
}

