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
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:8',
        ]);
        if(!Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return back()->withErrors(['login' => 'Sai tên đăng nhập hoặc mật khẩu.']);
        }
        $request->session()->regenerate();
        if(Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('home');
        
    }
}
