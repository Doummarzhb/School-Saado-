<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{
    use HasFactory;
    //php artisan make:model SubjectModel
    protected $table = 'subject';

    static public function getRecord($name = null, $date = null)
    {
        $return = SubjectModel::select('subject.*', 'users.name as created_by_name')
            ->join('users', 'users.id', '=', 'subject.created_by')
            ->where('subject.is_delete', '=', 0);
            if (!empty($name)) {
                $return->where('subject.name', 'LIKE', '%' . $name . '%');
            }
            //filter
            if (!empty($type)) {
                $return->where('subject.type', '=', $type);
            }
            if (!empty($date)) {
                $return->whereDate('subject.created_at', '=', $date);
            }
        $return = $return->orderBy('subject.id', 'desc')
            ->paginate(5);

        return $return;
    }



    static   public function getSingle($id)
    {

        return SubjectModel::find($id);
    }
//  static public function getSubject()
//  {
//     $return = self::select('subject.*')
//     ->join('users', 'users.id', '=', 'subject.created_by')
//     ->where('subject.is_delete', '=', 0)
//     ->where('subject.status', '=', 0)
//     ->orderBy('subject.name', 'asc')
//     ->get();

// return $return;
//  }
static public function getSubject()
{
    return self::select('subject.*')
        ->join('users', 'users.id', '=', 'subject.created_by')
        ->where('subject.is_delete', 0)
        ->where('subject.status', 0)
        ->orderBy('subject.name', 'asc')
        ->get();

        // return $return;
}
}
