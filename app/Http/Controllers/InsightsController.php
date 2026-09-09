<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class InsightsController extends Controller
{
    public function index()
    {
        $featured = Article::published()->where('is_featured', true)->latest('published_at')->first();
        $articles = Article::published()
            ->when($featured, fn($q) => $q->where('id', '!=', $featured->id))
            ->latest('published_at')
            ->get();

        return view('insights', compact('featured', 'articles'));
    }

    public function show(Article $article)
    {
        return view('insight-show', compact('article'));
    }
}
