<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

/**
 *
 */
class UpdateController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function __invoke(UpdateRequest $request, Post $post): RedirectResponse
    {
        $data = $request->validated();
        $tags = $data['tags'];
        unset($data['tags']);
        $post->update($data);
        // Удаляем старые привязки и создаём новые
        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);
    }
}
