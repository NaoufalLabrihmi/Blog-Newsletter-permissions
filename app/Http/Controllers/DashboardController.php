<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Subscribe;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

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

    public function generateDashboardPDF()
    {
        $data = [
            'postCount' => Post::count(),
            'tagCount' => Tag::count(),
            'userCount' => User::count(),
            'subscribeCount' => Subscribe::count(),
        ];

        $pdf = new Dompdf();
        $pdf->loadHtml(View::make('dashboard-pdf', $data)->render());

        $pdf->setPaper('A4', 'landscape');

        $pdf->render();

        return $pdf->stream('dashboard-statistics.pdf');
    }
}
