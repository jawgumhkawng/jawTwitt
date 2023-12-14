<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(CreateCommentRequest $request, Post $post)
    {

        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->user_id = auth()->id();
        $comment->content = request()->get("content");
        $comment->save();


        // $validated = $request->validated();

        // $validated['user_id'] = auth()->id();
        // $validated['post_id'] = $post->id;

        // Comment::create($validated);

        return redirect()->route('posts.show',  $post->id)->with('success', 'Comment Created Successfully !');
    }

    // public function delete(Comment $comment, $post)
    // {
    // $this->authorize('delete', $comment);
    // $comments = Comment::find($comment);
    // $comments->delete();

    // $post =  Post::findOrFail($id);
    // $post->delete();

    //     return redirect()->route('posts.show',  $post->id)->with('delete', 'Post Delete Successfully !');
    // }
}