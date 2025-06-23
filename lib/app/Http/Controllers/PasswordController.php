<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function getChangePassword()
    {
        return view('frontend.password');
    }

    public function updatePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();

        // Kiểm tra mật khẩu cũ
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Mật khẩu cũ không đúng.');
        }

        // Cập nhật mật khẩu mới
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->intended('/')->with('success', 'Đổi mật khẩu thành công!');
    }

}
