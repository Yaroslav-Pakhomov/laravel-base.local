<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Post;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 *
 */
class IndexController extends BaseController
{
    /**
     * @param FilterRequest $request
     * @return Factory|View|Application
     * @throws BindingResolutionException
     */
    public function __invoke(FilterRequest $request): Factory|View|Application
    {
        // Получаем и производим валидацию GET-параметров
        $data = $request->validated();
        // array_filter нужен для того, чтобы если параметр не пуст он вызовет функцию "Callback"
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        // Создаём динамичный запрос, метод filter() - это scopeFilter() в traits Filterable
        $posts = Post::filter($filter)->paginate(10);
        // $posts = Post::paginate(10);
        $i = 0;

        return view('post.index', compact('posts', 'i'));

        // $query = Post::query();
        // if (isset($data['category_id'])):
        // $query->where('category_id', $data['category_id']);
        // endif;
        // $posts = $query->get();
        // dd($posts);
        // if (isset($data['title'])):
        //     //Ищем по подстроке
        //     $query->where('title', 'like',  "%{$data['category_id']}%");
        // endif;
        //

    }
}
