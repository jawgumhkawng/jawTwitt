<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class DashboardController extends Controller
{
    public function index()
    {


        $posts = Post::latest();

        if (request()->has("search")) {
            $posts = $posts->where("content", "like", "%" . request()->get('search') . "%");
        }

        return view("/dashboard", ["posts" => $posts->paginate(3)]);
    }
}
