<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 *
 */
class ShowController extends BaseController
{
    /**
     * @param Post $post
     * @return Factory|View|Application
     */
    public function __invoke(Post $post): Factory|View|Application
    {
        return view('post.show', compact('post'));
    }
}
