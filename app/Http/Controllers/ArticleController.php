<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(10);

        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'image' => ['nullable', 'string', 'max:255'],
        ]);

        $article = new Article();
        $article->title = $data['title'];
        $article->slug = Str::slug($data['title'] . '-' . time());
        $article->body = $data['body'];
        $article->image = $data['image'] ?? 'default.png';
        $article->user_id = Auth::id();
        $article->save();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Artikel berhasil dibuat.');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'image' => ['nullable', 'string', 'max:255'],
        ]);

        $article->title = $data['title'];
        $article->slug = Str::slug($data['title'] . '-' . time());
        $article->body = $data['body'];
        $article->image = $data['image'] ?? $article->image;
        $article->save();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Artikel berhasil diupdate.');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }
}
