<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

//

class ArticleController extends Controller
{
    public function index(): Factory|View|Application
    {
        $articles = Article::all();
        return view('article.index', compact('articles'));
    }

    public function create(): Factory|View|Application
    {
        return view('article.create');
    }

    public function store(): RedirectResponse
    {
        $data = request()->validate([
            'title'       => 'string',
            'content'     => 'string',
            'category_id' => 'integer',
            'tag_id'      => 'integer',
        ]);

        Article::create($data);
        return redirect()->route('article.index');
    }

    public function show(Article $article): Factory|View|Application
    {
        return view('article.show', compact('article'));
    }

    public function edit(Article $article): Factory|View|Application
    {
        return view('article.edit', compact('article'));
    }

    public function update(Article $article): RedirectResponse
    {
        $data = request()->validate([
            'title'       => 'string',
            'content'     => 'string',
            'category_id' => 'integer',
            'tag_id'      => 'integer',
        ]);

        $article->update($data);
        return redirect()->route('article.show', compact('article'));
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();
        return redirect()->route('article.index');
    }


}
