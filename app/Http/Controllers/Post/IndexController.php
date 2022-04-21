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
class IndexController extends BaseController
{
    /**
     * @return Factory|View|Application
     */
    public function __invoke(): Factory|View|Application
    {
        $posts = Post::all();
        $i = 0;

        return view('post.index', compact('posts', 'i'));
    }
}
