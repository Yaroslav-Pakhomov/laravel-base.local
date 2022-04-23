<?php

declare(strict_types = 1);


namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function __invoke(): RedirectResponse
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
}
