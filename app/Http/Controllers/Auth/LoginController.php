<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function showLoginForm()
    {
        return view('auth.login');
    }

    function login(Request $request)
    {
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('home');
        } else {
            return back()->withErrors(['login' => 'Sai tên đăng nhập hoặc mật khẩu.']);
        }
    }
}
