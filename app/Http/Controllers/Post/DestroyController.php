<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\RedirectResponse as RedirectResponseAlias;

/**
 *
 */
class DestroyController extends Controller
{
    /**
     * @param Post $post
     * @return RedirectResponseAlias
     */
    public function __invoke(Post $post): RedirectResponseAlias
    {
        $post->delete();

        return redirect()->route('post.index');
    }
}
