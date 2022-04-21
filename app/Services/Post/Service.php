<?php

declare(strict_types = 1);

namespace App\Services\Post;

use App\Models\Post;

class Service
{
    public function store(array $data): void
    {
        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::create($data);
        $post->tags()->attach($tags);
    }

    public function update(Post $post, array $data): void
    {
        $tags = $data['tags'];
        unset($data['tags']);
        $post->update($data);
        // Удаляем старые привязки и создаём новые
        $post->tags()->sync($tags);
    }
}
