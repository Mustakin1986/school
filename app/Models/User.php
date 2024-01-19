<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\ClassModel;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function classModel()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    static public function getSingle($id){
        return self::find($id);
    }
    static public function getTeacherClass()
    {
        $query =self::select('users.*')
            ->where('users.role','=',2)
            ->where('users.is_delete','=',0)
            ->orderBy('users.id','desc')
            ->get();
        return $query;
    }
    static public function getSearchStudent()
    {
     if(!empty(Request::get('id'))||!empty(Request::get('name'))||!empty(Request::get('email')))
      {
      $query =self::select('users.*','class_models.name as class_name')
                    ->join('class_models','class_models.id','=','users.class_id','left')
                    ->where('users.role','=',3)
                    ->where('users.is_delete','=',0);
                    if(!empty(Request::get('id'))){
                        $return=$query->where('users.id','=',Request::get('id'));
                    }
                    if(!empty(Request::get('name'))){
                        $return=$query->where('users.name','like','%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('email'))){
                        $return=$query->where('users.email','like','%'.Request::get('email').'%');
                    }
             $data=$return->orderBy('users.id','desc')
                    ->limit(10)
                    ->get();
      return $data;
      }
    }
    static public function getMySon($parent_id)
    {
        $query =self::select('users.*','class_models.name as class_name','parent.name as parent_name')
                    ->join('users as parent','parent.id','=','users.parent_id','left')
                    ->join('class_models','class_models.id','=','users.class_id','left')
                    ->where('users.role','=',3)
                    ->where('users.parent_id','=',$parent_id)
                    ->where('users.is_delete','=',0)
                    ->orderBy('users.id','desc')
                    ->get();
        return $query;
    }

    static public function getStudent(){
      $query= self::select('users.*','class_models.name as class_name','parent.name as parent_name','parent.last_name as  parent_lastName')
             ->join('users as parent','parent.id','=','users.parent_id','left')
             ->join('class_models','class_models.id','=','users.class_id','left')
            ->where('users.role','=',3)
            ->where('users.is_delete','=',0)
            ->Orderby('id','desc')
            ->paginate(10);

     return $query;
    }

    static public function getTeacherStudent($teacher_id){
        $query= self::select('users.*','class_models.name as class_name')
                    ->join('class_models','class_models.id','=','users.class_id','left')
                    ->join('assign_class_teachers','assign_class_teachers.class_id','=','class_models.id')
                    ->where('assign_class_teachers.teacher_id','=',$teacher_id)
                    ->where('users.role','=',3)
                    ->where('users.is_delete','=',0)
                    ->Orderby('id','desc')
                    ->groupBy('users.id')
                    ->get();

          return $query;
    }

    static public function getTeacher()
{
    $query = self::select('users.*')
        ->where('users.role', '=', 2)
        ->where('users.is_delete', '=', 0);

    // Initialize $return outside the if conditions
    $return = $query;

    if (!empty(Request::get('id'))) {
        $return = $query->where('users.id', '=', Request::get('id'));
    }
    if (!empty(Request::get('name'))) {
        $return = $query->where('users.name', 'like', '%' . Request::get('name') . '%');
    }
    if (!empty(Request::get('email'))) {
        $return = $query->where('users.email', 'like', '%' . Request::get('email') . '%');
    }

    // Use $return instead of $query in the paginate method
    $data = $return->orderBy('users.id', 'desc')
                   ->paginate(10);

    return $data;
  }

  public function getImage()
        {
            if (!empty($this->image) && file_exists(public_path('/Profile/' . $this->image))) {
                return url('/Profile/' . $this->image);
            } else {
                return "";
            }
        }

}
