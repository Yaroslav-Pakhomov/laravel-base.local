<?php

declare(strict_types = 1);


namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    /**
     * @param Article $article
     * @return RedirectResponse
     */
    public function __invoke(Article $article): RedirectResponse
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
}
