<?php

declare(strict_types = 1);


namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\UpdateRequest;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param Article $article
     * @return RedirectResponse
     */
    public function __invoke(UpdateRequest $request, Article $article): RedirectResponse
    {
        $data = $request->validated();
        $article->update($data);

        return redirect()->route('article.show', compact('article'));
    }
}
