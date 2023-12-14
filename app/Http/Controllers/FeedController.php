<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // $user = auth()->user();

        $followerId = auth()->user()->following()->pluck('user_id');

        $posts = Post::whereIn('user_id', $followerId)->latest();

        if (request()->has("search")) {
            $posts = $posts->where("content", "like", "%" . request()->get('search') . "%");
        }

        return view("/dashboard", ["posts" => $posts->paginate(3)]);
    }
}