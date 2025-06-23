<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VpCategory;
use App\Models\VpComment;
use App\Models\VpProduct;
use App\Models\VpUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function getHome()
    {
        $product_cnt = count( VpProduct::all());
        $comment_cnt = count( VpComment::all());
        $user_cnt = count( VpUser::Where('level', 2)->get());
        $category_cnt = count( VpCategory::all());
        return view('backend.index', compact('product_cnt', 'comment_cnt', 'user_cnt', 'category_cnt'));
    }
    public function getLogout()
    {
        Auth::logout();

        return redirect()->intended('/');
    }
}
