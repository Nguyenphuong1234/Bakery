<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VpComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getComment()
    {
        $comment_not_confirm = VpComment::Where('com_status', 0)->get();
        $comment_confirmed = VpComment::Where('com_status', 1)->get();

        return view('backend.comment', compact('comment_not_confirm', 'comment_confirmed'));
    }
    public function getDeleteComment($id)
    {
        $comment = VpComment::find($id);
        $comment->delete();

        return redirect()->intended('admin/comment')->with('success', 'Xóa bình luận thành công!');
    }
    public function confirmComment($id)
    {
        $comment = VpComment::find($id);
        $comment->com_status = 1;
        $comment->save();

        return redirect()->intended('admin/comment')->with('success', 'Duyệt bình luận thành công!');
    }
}
