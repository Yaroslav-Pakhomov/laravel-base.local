<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use JetBrains\PhpStorm\NoReturn;

/**
 *
 */
class PostController extends Controller
{
    public function index(): Application|View|Factory
    {
        $posts = Post::all();
        $i = 0;
        return view('post.index', compact('posts', 'i'));


        // Работа по конвенции Laravel (проверка)
        // $writer = Writer::find(3);
        // $series = Series::find(1);
        // $genre = Genre::find(3);
        // dd($writer->genres);
        // dd($genre->writers);
        // dd($series->writers);
        // dd($writer->series);
        // Работа по конвенции Laravel (проверка) - конец


        // $categories = Category::all();
        // $category = Category::find(1);
        // $tag = Tag::find(4);
        // $post = Post::find(5);
        //
        // dd($tag->posts);
        // dd($post->tags);
        // dd($post->category->title);
        // dd($category->posts);
    }

    public function create(): Factory|View|Application
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store(): RedirectResponse
    {
        $data = request()->validate([
            'title'       => 'required|string',
            'content'     => 'string',
            'image'       => 'string',
            'category_id' => '',
            'tags'        => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);
        // foreach ($tags as $tag):
        //     PostTag::firstOrCreate([
        //         'tag_id' => $tag,
        //         'post_id' => $post->id,
        //     ]);
        // endforeach;
        // Создаём привязки
        $post->tags()->attach($tags);

        return redirect()->route('post.index');
        // dd($tags, $data);
    }

    public function show(Post $post): Factory|View|Application
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post): Factory|View|Application
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post): RedirectResponse
    {
        $data = request()->validate([
            'title'       => 'string',
            'content'     => 'string',
            'image'       => 'string',
            'category_id' => '',
            'tags'        => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post->update($data);
        // $post = $post->fresh();
        // Удаляем старые привязки и создаём новые
        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('post.index');
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
