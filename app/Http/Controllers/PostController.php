<?php

namespace App\Http\Controllers;

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
    public function create()
    {

        $validated = request()->validate(
            [
                'content' => 'required|min:5|max:255',

            ]
        );

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

    public function update(Post $post)
    {

        $this->authorize('update', $post);

        $validated = request()->validate(
            [
                'content' => 'required|min:5|max:255',

            ]
        );

        $post->update($validated);

        return redirect()->route('posts.show', $post)->with('success', 'Post Updated Successfully !');
    }
}
