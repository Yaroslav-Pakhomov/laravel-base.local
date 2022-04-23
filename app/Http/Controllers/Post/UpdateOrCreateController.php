<?php

declare(strict_types = 1);


namespace App\Http\Controllers\Post;

use App\Models\Post;
use JetBrains\PhpStorm\NoReturn;

// Комбинированные запросы
// firstOrCreate - достаём уникальный объект по атрибуту из базы, если не находит, то создаёт (проверяет на дубликаты)
// updateOrCreate - обновляет записи, если не находит, то создаёт (проверка на дубликат)

class UpdateOrCreateController extends BaseController
{
    #[NoReturn] public function __invoke(): void
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
