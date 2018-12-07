<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function buatKomentar(Request $request,Post $post)
    {
    	$comment = new Comment;
    	$comment->comment = $request->comment;
    	$comment->user_id = auth()->user()->id;

    	$post->comments()->save($comment);

    	return back()->withMessage('komentar terkirim...');
    }
}
