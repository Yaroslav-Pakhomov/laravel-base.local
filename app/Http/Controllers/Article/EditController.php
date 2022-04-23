<?php

declare(strict_types = 1);


namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class EditController extends Controller
{
    public function __invoke(Article $article): Factory|View|Application
    {
        return view('article.edit', compact('article'));
    }
}
