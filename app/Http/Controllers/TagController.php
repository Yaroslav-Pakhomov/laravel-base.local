<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Tag;
use JetBrains\PhpStorm\NoReturn;

//

class TagController extends Controller
{
    #[NoReturn] public function index(): void
    {
        $tag_1 = Tag::find(1);
        dump($tag_1);
        echo "</br>";
        $tag_2 = Tag::find(2);
        dump($tag_2);
        echo "</br>";
        dump($tag_1->title);
        echo "</br>";
        dump($tag_2->title);
        echo "</br>";
        // return 'Create post';
    }

}
