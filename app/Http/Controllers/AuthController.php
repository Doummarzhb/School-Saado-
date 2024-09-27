<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Hash;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    // Display the login form
    public function login()
    {
        if (!empty(Auth::check()) ){
            if(Auth::user()->user_type ==1)
            {
              return redirect('admin/dashboard');

            }
            elseif(Auth::user()->user_type==2)
            {
                return redirect('teacher/dashboard');

            }
            elseif(Auth::user()->user_type==3)
            {
                return redirect('student/dashboard');

            }
            elseif(Auth::user()->user_type==4)
            {
                return redirect('parent/dashboard');

            }
        }
        // dd(Hash::make(12345));
        return view('auth.login');
    }

    // Handle login request
    public function AuthLogin(Request $request)
    {
        $remember = !empty($request->remember) ? true :false ;

        // dd($request->all());


        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (auth()->attempt($request->only('email', 'password') ,$remember)) {

            if(Auth::user()->user_type ==1)
            {
              return redirect('admin/dashboard');

            }
            elseif(Auth::user()->user_type==2)
            {
                return redirect('teacher/dashboard');

            }
            elseif(Auth::user()->user_type==3)
            {
                return redirect('student/dashboard');

            }
            elseif(Auth::user()->user_type==4)
            {
                return redirect('parent/dashboard');

            }
            // return redirect('admin/dashboard');
        }


        return back()->with('error', 'Invalid credentials');
    }
    public function logout(){

        Auth::logout();

        return redirect(url(''));

    }

    public function forgotpassword(){

        return view('auth.forgot');
    }

    public function PostForgotPassword(Request $request){
        // dd($request->all()); method 1
        //hayde mnchn ybayen data le 3nde hene le msajal fyn abel w hayda marbut ma3 web.php
        //taba3 route laan hunek 3am 3aref name taba3 function w hun 3am tabe2

        //method 2 check email

        // $getEmailSingle = User::getEmailSingle($request->email);
        // dd($getEmailSingle);

        //method 3
        $user = User::getEmailSingle($request->email);
        if(!empty($user))
        {
            $user->remember_token = Str::random(30);
            $user->save();
            // ForgotPasswordMail::
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('success', "Please check your email and reset password");


        }
        else{
            return redirect()->back()->with('error', "Email not found in the system");
        }
    }

    public function reset($remember_token)
    {
        $user = User::getTokenSingle($remember_token);

        if(!empty($user))
        {

            $data['user'] = $user;
            return view('auth.reset',$data);
        }
        else {
            abort(404);
        }
        // dd($remember_token);
    }
    public function PostReset($token , Request $request)
    {

        if($request->password == $request->cpassword)
        {
            $user = User::getTokenSingle($token);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();

            return redirect(url('login'))->with('success',"password Successfully reset");


        }
        else
        {

            return redirect()->back()->with('error', "Password and confirm Password does not match ");
        }
    }
}
