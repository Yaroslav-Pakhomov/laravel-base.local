<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\StoreRequest;
use Illuminate\Http\RedirectResponse;

// use App\Http\Resources\Post\PostResource;

/**
 *
 */
class StoreController extends BaseController
{
    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->service->store($data);

        // Для получения массива-ответа
        // return new PostResource($post);

        return redirect()->route('post.index');
    }
}
