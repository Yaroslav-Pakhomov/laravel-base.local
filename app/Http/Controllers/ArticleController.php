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

}
