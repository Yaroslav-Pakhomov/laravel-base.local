<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use JetBrains\PhpStorm\NoReturn;

/**
 *
 */
class PostController extends Controller
{
    #[NoReturn] public function index(): Application|View|Factory
    {
        // $post = Post::find(1);
        // dump($post);
        // echo "</br>";
        // echo "</br>";
        // dump('All');
        // $posts = Post::all();
        // foreach ($posts as $post):
        //     dump($post->title);
        //     dump($post->content);
        //     dump($post->image);
        //     dump($post->likes);
        //     dump($post->is_published);
        //     echo '</br>';
        // endforeach;
        // echo '</br>';
        // echo "</br>";
        // // $posts = Post::where('is_published', 1)->first();
        // // $posts = Post::where('is_published', 0)->first();
        // dump('Is published');
        // $posts = Post::where('is_published', 1)->get();
        // foreach ($posts as $post):
        //     dump($post->title);
        //     dump($post->content);
        //     dump($post->image);
        //     dump($post->likes);
        //     dump($post->is_published);
        //     echo "</br>";
        // endforeach;
        // echo "</br>";
        //
        // dump('No published, no likes');
        // $posts = Post::where('is_published', 0)
        //     ->where('likes', 0)->get();
        // foreach ($posts as $post):
        //     dump($post->title);
        //     dump($post->content);
        //     dump($post->image);
        //     dump($post->likes);
        //     dump($post->is_published);
        // endforeach;
        // echo "</br>";
        // echo "</br>";
        // echo "</br>";

        $posts = Post::all();

        return view('posts', compact('posts'));

        // dd('end');
        // echo "</br>";
        // return 'Create post';
    }

    #[NoReturn] public function create(): void
    {
        $arrPosts = [
            [
                'title'        => 'Добавленный Пост 1',
                'content'      => 'Содержание добавленного Поста 1',
                'image'        => 'add_image_1',
                'likes'        => 10,
                'is_published' => 1
            ],
            [
                'title'        => 'Добавленный Пост 2',
                'content'      => 'Содержание добавленного Поста 2',
                'image'        => 'add_image_2',
                'likes'        => 10,
                'is_published' => 1
            ]
        ];
        foreach ($arrPosts as $post):
            dump($post);
            Post::create($post);
            // Post::create([
            //     'title'        => $post['title'],
            //     'content'      => $post['content'],
            //     'image'        => $post['image'],
            //     'likes'        => $post['likes'],
            //     'is_published' => $post['is_published'],
            // ]);
        endforeach;
        dd('created');
    }

    #[NoReturn] public function update(): void
    {
        $post = Post::find(6);
        dump('Выбранный Пост');
        dump($post);
        $post->likes++;
        $upPost = [
            'title'        => 'Обновлённый Пост 1',
            'content'      => 'Содержание обновлённого Поста 1',
            'image'        => 'update_image_1',
            'likes'        => $post->likes,
            'is_published' => $post->is_published
        ];
        dump('Обновление Поста');
        dump($upPost);
        $post->update($upPost);
        dd('Обновлено');
    }

    #[NoReturn] public function delete(): void
    {
        //Восстановление удалённого элемента
        $post = Post::withTrashed()->find(13);
        $post->restore();

        // $post = Post::find(13);
        dump($post->title);
        $post->delete();
        dd('Элемент удален');
    }

    // Комбинированные запросы
    // firstOrCreate - достаём уникальный объект по атрибуту из базы, если не находит, то создаёт (проверяет на дубликаты)
    // updateOrCreate - обновляет записи, если не находит, то создаёт (проверка на дубликат)
    #[NoReturn] public function firstOrCreate(): void
    {
        // $post = Post::find(13);
        $anotherPost = [
            // 'title'        => 'Другой Пост 2',
            'content'      => 'Содержание другого Поста 2',
            'image'        => 'another_image_2',
            'likes'        => 500,
            'is_published' => 1
        ];

        $post = Post::firstOrCreate([
            'title' => 'Уникальный Пост 3'
        ], [
            // 'title'        => $anotherPost['title'],
            'content'      => $anotherPost['content'],
            'image'        => $anotherPost['image'],
            'likes'        => $anotherPost['likes'],
            'is_published' => $anotherPost['is_published']
        ]);
        dump($post->content);
        dd('Final');
    }

    #[NoReturn] public function updateOrCreate(): void
    {
        $anotherPost = [
            'title'        => 'Add Post 123',
            'content'      => 'Содержание обновлённого Поста 123',
            'image'        => 'update_image_1',
            'likes'        => 500,
            'is_published' => 1
        ];

        $post = Post::updateOrCreate([
            'title' => 'Уникальный Пост 3'
        ], $anotherPost);
        dump($post->content);
        dd('Final');
    }

}
