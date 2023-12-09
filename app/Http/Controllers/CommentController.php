<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store($id)
    {
        $comment = new Comment();
        $comment->post_id = $id;
        $comment->content = request()->get("content");
        $comment->save();

        return redirect()->route('post.show', $id)->with('success', 'Comment Created Successfully !');
    }
}
