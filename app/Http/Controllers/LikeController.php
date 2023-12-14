<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Post $post)
    {
        $liker = auth()->user();

        $liker->like()->attach($post);

        return redirect()->route('dashboard')->with('success', 'Like Success !');;
    }

    public function unlike(Post $post)
    {
        $liker = auth()->user();

        $liker->like()->detach($post);

        return redirect()->route('dashboard')->with('delete', 'Unlike Success !');
    }
}
