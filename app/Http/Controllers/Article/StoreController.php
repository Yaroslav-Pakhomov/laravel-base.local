<?php

declare(strict_types = 1);


namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreRequest;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Article::create($data);

        return redirect()->route('article.index');
    }
}
