<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store($id)
    {

        $comment = new Comment();
        $comment->post_id = $id;
        $comment->user_id = auth()->id();
        $comment->content = request()->get("content");
        $comment->save();

        return redirect()->route('post.show', $id)->with('success', 'Comment Created Successfully !');
    }
}
