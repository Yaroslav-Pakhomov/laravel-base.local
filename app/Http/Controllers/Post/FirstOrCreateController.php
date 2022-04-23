<?php

declare(strict_types = 1);


namespace App\Http\Controllers\Post;

use App\Models\Post;
use JetBrains\PhpStorm\NoReturn;

// Комбинированные запросы
// firstOrCreate - достаём уникальный объект по атрибуту из базы, если не находит, то создаёт (проверяет на дубликаты)
// updateOrCreate - обновляет записи, если не находит, то создаёт (проверка на дубликат)

class FirstOrCreateController extends BaseController
{
    /**
     * @return void
     */
    #[NoReturn] public function __invoke(): void
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
}
