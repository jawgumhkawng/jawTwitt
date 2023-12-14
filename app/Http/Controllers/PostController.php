<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\EditPostRequest;
use App\Models\Post;
use App\Models\User;
use App\Mail\TwittEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function index()
    {
        return redirect()->route('dashboard');
    }
    public function show(Post $post)
    {

        return view("post.detail", compact("post"));
    }
    public function create(CreatePostRequest $request)
    {

        $validated = $request->validated();

        $validated['user_id'] = auth()->id();

        $post = Post::create($validated);


        return redirect(route('dashboard'))->with('success', 'Post Create Successfully !');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        // $post =  Post::findOrFail($id);
        // $post->delete();

        return redirect(route('dashboard'))->with('delete', 'Post Delete Successfully !');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        $editing = true;

        return view("post.detail", compact("post", "editing"));
    }

    public function update(EditPostRequest $request, Post $post)
    {

        $this->authorize('update', $post);

        $validated = $request->validated();

        $post->update($validated);

        return redirect()->route('posts.show', $post)->with('success', 'Post Updated Successfully !');
    }
}
