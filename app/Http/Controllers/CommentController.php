<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 追記
use App\Models\Comment;

class CommentController extends Controller
{
    public function create(Request $request)
    {
                // Validationをかける
        $this->validate($request, Comment::$rules);
        
        $comment = new Comment();
        $comment->news_id = $request->id;
        $comment->comment = $request->comment;
        $comment->save();

        return redirect('detail?id=' . $request->id);
    }
}