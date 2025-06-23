<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VpUser;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function getAccount()
    {
        $accounts = VpUser::Where('level', 2)->get();

        return view('backend.account', compact('accounts'));
    }
    public function getDeleteAccount($id)
    {
        $account = VpUser::find($id);

        $account->delete();

        return redirect()->intended('admin/account')->with('success', 'Xóa tài khoản thành công!');
    }
}
