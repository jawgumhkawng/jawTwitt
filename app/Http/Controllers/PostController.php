<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post)
    {

        return view("post.detail", compact("post"));
    }
    public function store()
    {

        $validated = request()->validate(
            [
                'content' => 'required|min:5|max:255',

            ]
        );

        $validated['user_id'] = auth()->id();

        Post::create($validated);

        return redirect(route('dashboard'))->with('success', 'Post Create Successfully !');
    }

    public function destroy(Post $post)
    {

        $post->delete();

        // $post =  Post::findOrFail($id);
        // $post->delete();

        return redirect(route('dashboard'))->with('delete', 'Post Delete Successfully !');
    }

    public function edit(Post $post)
    {
        $editing = true;

        return view("post.detail", compact("post", "editing"));
    }

    public function update(Post $post)
    {


        $validated = request()->validate(
            [
                'content' => 'required|min:5|max:255',

            ]
        );

        $post->update($validated);

        return redirect()->route('post.show', $post)->with('success', 'Post Updated Successfully !');
    }
}
