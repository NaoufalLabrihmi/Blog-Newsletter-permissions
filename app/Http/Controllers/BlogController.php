<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function index(Post $post)
    {
        $tags = Tag::get();
        $posts = Post::with('tags', 'author')->orderBy('updated_at', 'desc')->paginate(9);
        $popularWeek = Post::popularWeek()->take(2)->get();
        $popularDay = Post::popularDay()->take(2)->get();
        return view('blog', [
            'posts' => $posts,
            'tags' => $tags,
            'popularWeek' => $popularWeek,
            'popularDay' => $popularDay,
        ]);
    }
}
