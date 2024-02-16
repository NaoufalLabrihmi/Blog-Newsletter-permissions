<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Subscribe;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Post $post)
    {
        $postCount = Post::count();
        $tagCount = Tag::count();
        $userCount = User::count();
        $subscribeCount = Subscribe::count();
        return view('dashboard', [
            'postCount' => $postCount,
            'tagCount' => $tagCount,
            'userCount' => $userCount,
            'subscribeCount' => $subscribeCount,
            'post' => $post,
        ]);
    }
}
