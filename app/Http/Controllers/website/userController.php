<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Mail\forgetpassword;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use App\Mail\verifymail;

class userController extends Controller
{
    public function login_view()
    {
        return view('website.login');
    }

    public function register_view()
    {
        return view('website.register');
    }

    public function login()
    {
        $credentials =  request()->only('email', 'password');
        $remember_me = false;
        if (request('remember')) {
            $remember_me = true;
        }
        if (Auth::attempt($credentials, $remember_me)) {

            return redirect('/');
        } else {
            $lang = Lang::locale();
            if (!in_array($lang, ['en'])) {
                return redirect()->back()->with('error', 'خطأ في البريد الالكتروني او كلمة المرور');
            } else {
                return redirect()->back()->with('error', 'wrong email or password');
            }
        }
    }

    public function register()
    {
        request()->validate([
            "name" => "required|min:3|max:50|string",
            "email" => "required|email|unique:users,email",
            "phone" => "required|numeric|unique:users,phoneNumber",
            "password" => "required|min:6|max:16|confirmed",
        ]);
        $lang = Lang::locale();
        if (!request()->get("check")) {
            if (!in_array($lang, ['en'])) {
            return redirect()->back()->with('error', 'يجب عليك التحقق من الشروط والأحكام');
            }else {
            return redirect()->back()->with('error', 'you must check terms and conditions');
            }
        }
        // if (!request()->get("check")) {
        //     return redirect()->back()->with('error', 'you must check terms and conditions');
        // }
        // save user object

        // save admin object
        $user = new users();
        $user->name = request('name');
        $user->type = 2;
        $user->email  = request('email');
        $user->password = Hash::make(request('password'));
        $user->phoneNumber  = request('phone');
        $user->status = 1;
        $user->save();
        $credentials =  request()->only('email', 'password');
        Auth::attempt($credentials, true);
        Mail::to(request("email"))->send(new verifymail($user));
        return redirect("/verifymail");
        // return redirect("/");
    }

    public function verifymail()
    {
        return view("website.verify");
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }

    public function forget_password()
    {
        return view('website.forgetpassword');
    }

    public function reset_password_request()
    {
        request()->validate([
            "email" => "required|email|exists:users,email"
        ]);

        $user = users::where("email", request("email"))->first();
        $details = "If you didn't request to change the password, please ignore this email. If you would like to proceed.";
        $user->reset_key =  substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 7);
        $user->save();
        Mail::to(request("email"))->send(new forgetpassword($details, $user));
        return redirect("/resetpassword");
    }

    public function resetpassword()
    {
        return view("website.resetpassword");
    }

    public function resetpassword_request()
    {
        request()->validate([
            "key" => "required|string|exists:users,reset_key",
            "password" => "required|min:6|max:16|confirmed",
        ]);
        $user = users::where("reset_key", request("key"))->first();
        $user->password = Hash::make(request("password"));
        $user->save();
        $lang = Lang::locale();
        if (!in_array($lang, ['en'])) {
            return redirect()->back()->with("message", "تم تغيير الرقم السري بنجاح");
        } else {
            return redirect()->back()->with("message", "password changed successfully");
        }
    }

}
