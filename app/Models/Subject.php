<?php

namespace App\Models;

use App\Models\ClassModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function classModel()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }
    public function classWiseSubjects()
    {
        return $this->hasMany(ClassWiseSubject::class, 'subject_id');
    }
    public function user()
    {
        return $this->hasMany(User::class,);
    }
}

