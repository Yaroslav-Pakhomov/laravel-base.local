<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

/**
 *
 */
class UpdateController extends Controller
{
    /**
     * @param Post $post
     * @return RedirectResponse
     */
    public function __invoke(Post $post): RedirectResponse
    {
        $data = request()->validate([
            'title'       => 'string',
            'content'     => 'string',
            'image'       => 'string',
            'category_id' => '',
            'tags'        => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post->update($data);
        // Удаляем старые привязки и создаём новые
        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);
    }
}
