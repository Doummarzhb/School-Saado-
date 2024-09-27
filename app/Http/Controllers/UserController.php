<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserController extends Controller
{
    // php artisan make:controller UserController
    public function MyAccount()
    {
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        $data['header_title'] = "My Account";
        return view('teacher.account',$data);
    }
    // public function MyAccounts()
    // {
    //     $data['getRecord'] = User::getSingle(Auth::user()->id);
    //     $data['header_title'] = "My Account";
    //     return view('student.account',$data);
    // }
    public function change_password()
    {
        $data['header_title'] = "Change Password";
        return view('profile.change_password',$data);
    }
    public function update_change_password(Request $request)
    {
        $user = User::getSingle(Auth::user()->id);
        if(Hash::check($request->old_password,$user->password))
        {
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->back()->with('Success','Password Successfully Updated');

        }
        else
        {
            return redirect()->back()->with('error','Old Password is not Correct');
        }

    }
}
