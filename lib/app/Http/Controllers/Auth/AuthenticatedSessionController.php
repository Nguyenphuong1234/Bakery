<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Kiểm tra level và chuyển hướng tương ứng
        if (Auth::user()->level == 1) {
            return redirect()->intended('admin/home')->with('success', 'Đăng nhập thành công!');
        } else {
            return redirect()->intended('/')->with('success', 'Đăng nhập thành công!');
        }
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}