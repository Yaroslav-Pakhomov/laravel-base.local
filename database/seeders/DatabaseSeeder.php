<?php

declare(strict_types = 1);

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use JetBrains\PhpStorm\NoReturn;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    #[NoReturn] public function run(): void
    {
        Category::factory(20)->create();
        $tags = Tag::factory(50)->create();
        // Создаём и записываем в БД 100 постов
        $posts = Post::factory(200)->create();
        foreach ($posts as $post):
            // Получаем 5 случайных тегов и берём у них ID в виде массива
            $tagsIDs = $tags->random(5)->pluck('id');
            $post->tags()->attach($tagsIDs);
        endforeach;

        // Создание массива, который не идёт в базу.
        // $posts = Post::factory(1)->make();
        // \App\Models\User::factory(10)->create();
    }
}
