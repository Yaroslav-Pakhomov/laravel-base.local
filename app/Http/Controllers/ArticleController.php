<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Article;
use JetBrains\PhpStorm\NoReturn;

//

class ArticleController extends Controller
{
    #[NoReturn] public function index(): void
    {
        $article_1 = Article::find(1);
        dump($article_1);
        echo "</br>";
        $article_2 = Article::find(2);
        dump($article_2);
        echo "</br>";
        dump($article_2->type);
        echo "</br>";
        dump($article_2->breed);
        echo "</br>";
        dd($article_2->description);
        // return 'Create post';
    }

    public function create()
    {
        $arrArticles = [
            [
                'title'       => 'Добавленная Статья 1',
                'content'     => 'Содержание добавленной Статьи 1',
                'category_id' => 2,
                'tag_id'      => 1,
            ],
            [
                'title'       => 'Добавленная Статья 2',
                'content'     => 'Содержание добавленной Статьи 2',
                'category_id' => 1,
                'tag_id'      => 2,
            ],
        ];
        foreach ($arrArticles as $article):
            dump($article);
            Article::create($article);
        endforeach;

        dd('created');
    }


}
