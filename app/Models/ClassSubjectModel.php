<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ClassSubjectModel extends Model
{
    use HasFactory;
    protected $table = 'class_subject';


    public static function getRecord($class_name = null, $subject_name = null, $date = null)
    {

        $query = self::select('class_subject.*', 'class.name as class_name', 'subject.name as subject_name', 'users.name as created_by_name')
            ->join('subject', 'subject.id', '=', 'class_subject.subject_id')
            ->join('class', 'class.id', '=', 'class_subject.class_id')
            ->join('users', 'users.id', '=', 'class_subject.created_by')
            ->where('class_subject.is_delete','=',0);


        if (!empty($class_name)) {
            $query->where('class.name', 'LIKE', '%' . $class_name . '%');
        }

        if (!empty($subject_name)) {
            $query->where('subject.name', 'LIKE', '%' . $subject_name . '%');
        }

        if (!empty($date)) {
            $query->whereDate('class_subject.created_at', '=', $date);
        }


        return $query->orderBy('class_subject.id', 'desc')->paginate(3);
    }
    static public function getAlreadyFirst($class_id , $subject_id)
    {

        return self::where('class_id', '=', $class_id)->where('subject_id','=',$subject_id)->first();


    }
    public static function getAssignSubjectID($class_id)
    {
        return self::where('class_id', $class_id)
                   ->where('is_delete', 0)
                   ->get();
    }
    public static function deleteSubject($class_id)
    {
        return self::where('class_id', $class_id)->delete();
    }



}
