<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

/**
 *
 */
class StoreController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function __invoke(): RedirectResponse
    {
        $data = request()->validate([
            'title'       => 'required|string',
            'content'     => 'string',
            'image'       => 'string',
            'category_id' => '',
            'tags'        => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }
}
