<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 *
 */
class EditController extends BaseController
{
    /**
     * @param Post $post
     * @return Factory|View|Application
     */
    public function __invoke(Post $post): Factory|View|Application
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }
}
