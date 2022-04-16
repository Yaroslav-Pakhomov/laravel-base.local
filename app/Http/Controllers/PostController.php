<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Post;
use JetBrains\PhpStorm\NoReturn;

/**
 * @method static dump()
 */
class PostController extends Controller
{
    #[NoReturn] public function index(): void
    {
        $posts = Post::all();
        foreach ($posts as $post):
            dump($post->title);
            dump($post->content);
            dump($post->image);
            dump($post->likes);
            dump($post->is_published);
            echo '</br>';
        endforeach;
        echo '</br>';
        echo "</br>";
        // $posts = Post::where('is_published', 1)->first();
        // $posts = Post::where('is_published', 0)->first();
        $posts = Post::where('is_published', 1)->get();
        foreach ($posts as $post):
            dump($post->title);
            dump($post->content);
            dump($post->image);
            dump($post->likes);
            dump($post->is_published);
            echo "</br>";
        endforeach;
        echo "</br>";

        $posts = Post::where('is_published', 0)
            ->where('likes', 0)->get();
        foreach ($posts as $post):
            dump($post->title);
            dump($post->content);
            dump($post->image);
            dump($post->likes);
            dump($post->is_published);
        endforeach;
        echo "</br>";

        dd('end');
        // echo "</br>";
        // return 'Create post';
    }

}
