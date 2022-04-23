<?php

declare(strict_types = 1);


namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;

class DestroyController extends Controller
{
    public function __invoke(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()->route('article.index');
    }
}
