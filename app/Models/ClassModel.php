<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'class';

    static public function getRecord($name = null, $date = null)
    {
        $return = ClassModel::select('class.*', 'users.name as created_by_name')
            ->join('users', 'users.id', '=', 'class.created_by')
            ->where('class.is_delete', '=', 0);
        if (!empty($name)) {
            $return->where('class.name', 'LIKE', '%' . $name . '%');
        }
        if (!empty($date)) {
            $return->whereDate('class.created_at', '=', $date);
        }

        $return = $return->orderBy('class.id', 'desc')
            ->paginate(1);

        return $return;
    }



    static   public function getSingle($id)
    {

        return self::find($id);
    }

    // connection with class subject controller

    //   static public function getClass()
    // {
    //     $return = self::select('class.*')
    //     ->join('users', 'users.id', '=', 'class.created_by')
    //     ->where('class.is_delete', '=', 0)
    //     ->where('class.status', '=', 0)
    //     ->orderBy('class.name', 'asc')
    //     ->get();

    // return $return;

    // }
    static public function getClass()
{
    return self::select('class.*')
        ->join('users', 'users.id', '=', 'class.created_by')
        ->where('class.is_delete', 0)
        ->where('class.status', 0)
        ->orderBy('class.name', 'asc')
        ->get();
}
}
