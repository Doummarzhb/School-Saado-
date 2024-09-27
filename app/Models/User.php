<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',

    ];

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
    ];

    // static public function getAdmin()
    // {
    //     $return = self::select('id', 'name', 'email',"created_at") //
    //                ->where('user_type', '=', 1)
    //                ->where('is_delete' , '=' , 0);

    //                if(!empty(Request::get('email')))
    //                {
    //                 $return = $return->where('email','=',Request::get('email'));
    //                }

    //               $return = $return->orderBy('id', 'desc')
    //                ->paginate(1);

    //                return $return ;
    // }
    static public function getAdmin($name = null, $email = null)
    {
        $return = self::select('id', 'name', 'email', 'created_at')
                      ->where('user_type', '=', 1)
                      ->where('is_delete', '=', 0);

        if (!empty($name)) {
            $return->where('name', 'like', "%$name%");
        }

        if (!empty($email)) {
            $return->where('email', '=', $email);
        }

        if (!empty($date)) {
            $return->where('date', '=', $date);
        }

        $return = $return->orderBy('id', 'desc')
                         ->paginate(5);

        return $return;
    }
    //student
    static public function getStudent()
    {
        $query = self::select('users.*', 'class.name as class_name')
                      ->Join('class', 'class.id', '=', 'users.class_id')
                      ->where('users.user_type', '=', 3)
                      ->where('users.is_delete', '=', 0);

        // Filter by
        if (!empty(request()->get('name'))) {
            $query->where('users.name', 'like', '%' . request()->get('name') . '%');
        }
        if (!empty(request()->get('last_name'))) {
            $query->where('users.last_name', 'like', '%' . request()->get('last_name') . '%');
        }
        if (!empty(request()->get('email'))) {
            $query->where('users.email', 'like', '%' . request()->get('email') . '%');
        }
        if (!empty(request()->get('admission_number'))) {
            $query->where('users.admission_number', 'like', '%' . request()->get('admission_number') . '%');
        }


        if (!empty(request()->get('roll_number'))) {
            $query->where('users.roll_number', '=', request()->get('roll_number'));
        }
        if (!empty(request()->get('class'))) {
            $query->where('class.name', '=', request()->get('class'));
        }
        if (!empty(request()->get('mobile_number'))) {
            $query->where('users.mobile_number', '=', request()->get('mobile_number'));
        }
        if (!empty(request()->get('caste'))) {
            $query->where('users.caste', '=', request()->get('caste'));
        }
        if (!empty(request()->get(key: 'gender'))) {
            $query->where('users.gender', '=', request()->get('gender'));
        }
        if (!empty(request()->get(key: 'religion'))) {
            $query->where('users.religion', '=', request()->get('religion'));
        }
        if (!empty(request()->get(key: 'blood_group'))) {
            $query->where('users.blood_group', '=', request()->get('blood_group'));
        }
        if (!empty(request()->get(key: 'status'))) {
            $query->where('users.status', '=', request()->get('status'));
        }
        if (!empty(request()->get(key: 'admission_date'))) {
            $query->where('users.admission_date', '=', request()->get('admission_date'));
        }
        if (!empty(request()->get(key: 'date'))) {
            $query->where('users.created_at', '=', request()->get('created_at'));
        }

        if (!empty(request()->get('date'))) {
            $query->where('users.date_of_birth', '=', request()->get('date'));
        }


        $result = $query->orderBy('users.id', 'desc')
                        ->paginate(15);

        return $result;
    }



    static public function getEmailSingle($email){


        return User::where('email','=',$email)->first();
    }
    //doummar

    static public function getTokenSingle($remember_token)
    {

        return User::where('remember_token','=',$remember_token)->first();
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

    public function getProfile()
    {
        if(!empty($this->profile_pic) && file_exists('upload/profile/' .$this->profile_pic))
        {
            return url('upload/profile' .$this->profile_pic);

        }
        else
        {
            return "";
        }
    }

  static  public function getParent()
    {
        $return = self::select('id', 'name', 'email', 'created_at','mobile_number','occupation','address','gender')
        ->where('user_type', '=', 4)
        ->where('is_delete', '=', 0);


        if (!empty(request()->get('name'))) {
            $return->where('name', 'like', '%' . request()->get('name') . '%');
        }

        //filterrrrr
        if (!empty(request()->get('last_name'))) {
            $return->where('last_name', 'like', '%' . request()->get('last_name') . '%');
        }

         if (!empty(request()->get('email'))) {
            $return->where('email', 'like', '%' . request()->get('email') . '%');
        }
        if (!empty(request()->get('address'))) {
            $return->where('address', 'like', '%' . request()->get('address') . '%');
        }
        if (!empty(request()->get('mobile_number'))) {
            $return->where('mobile_number', 'like', '%' . request()->get('mobile_number') . '%');
        }
        if (!empty(request()->get('gender'))) {
            $return->where('gender', 'like', '%' . request()->get('gender') . '%');
        }
        if (!empty(request()->get('status'))) {
            $return->where('status', 'like', '%' . request()->get('status') . '%');
        }
        if (!empty(request()->get('occupation'))) {
            $return->where('occupation', 'like', '%' . request()->get('occupation') . '%');
        }




                $return = $return->orderBy('id', 'desc')
           ->paginate(10);

              return $return;
    }

    static public function getTeacher()
    {
        $query = self::select('users.*', 'class.name as class_name')
            ->join('class', 'class.id', '=', 'users.class_id')
            ->where('users.user_type', '=', 2)
            ->where('users.is_delete', '=', 0);

        // فلاتر
        $filters = [
            // الفلاتر هنا
        ];

        foreach ($filters as $key => $column) {
            if (!empty(request()->input($key))) {
                // شروط الفلترة هنا
            }
        }

        $result = $query->orderBy('users.id', 'desc')->paginate(15);

        return $result;
    }

         static public function getTeacherStudent($teacher_id)
{
    $query = self::select('users.*', 'class.name as class_name')
        ->join('class', 'class.id', '=', 'users.class_id')
        ->join('assign_class_teacher', 'assign_class_teacher.class_id', '=', 'users.class_id')
        ->where('assign_class_teacher.teacher_id', '=', $teacher_id)
        ->where('assign_class_teacher.status', '=', 0)
        ->where('assign_class_teacher.is_delete', '=', 0)
        ->where('users.user_type', '=', 2)
        ->where('users.is_delete', '=', 0);

    $result = $query->orderBy('users.id', 'desc')->paginate(10);

    return $result;
}
}
