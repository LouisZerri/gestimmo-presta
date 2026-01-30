<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total' => Article::count(),
            'published' => Article::where('is_published', true)->count(),
            'drafts' => Article::where('is_published', false)->count(),
        ];

        $recentArticles = Article::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentArticles'));
    }
}
