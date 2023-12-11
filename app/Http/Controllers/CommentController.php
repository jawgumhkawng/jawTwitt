<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Post $post)
    {

        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->user_id = auth()->id();
        $comment->content = request()->get("content");
        $comment->save();

        return redirect()->route('posts.show',  $post->id)->with('success', 'Comment Created Successfully !');
    }
}
