<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function Login()
    {
        return view('admin/auth/authentication-login');
    }

    public function Register()
    {
        return view(view: 'admin/auth/authentication-register');
    }

    public function RegisterUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|max:12'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $res = $user->save();
        if ($res) {
            return redirect()->route('dashboard')->with('success', 'You have registered successfully');
        } else {
            return back()->with('fail', 'Something wrong');
        }
    }
    public function LoginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4|max:12'
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            if (password_verify($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect()->route('dashboard');
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        } else {
            return back()->with('fail', 'This email is not registered');
        }
    }

    public function Logout()
    {
        if (session()->has('loginId')) {
            session()->pull('loginId');
            return redirect()->route('login');
        }
    }
}
