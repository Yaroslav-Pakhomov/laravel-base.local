<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Catalog;
use JetBrains\PhpStorm\NoReturn;

//

class CatalogController extends Controller
{
    #[NoReturn] public function index(): void
    {
        $catalog_1 = Catalog::find(1);
        dump($catalog_1);
        echo "</br>";
        $catalog_2 = Catalog::find(2);
        dump($catalog_2);
        echo "</br>";
        dump($catalog_2->title);
        echo "</br>";
        dump($catalog_2->description);
        echo "</br>";
        dd($catalog_2->price);
        // return 'Create post';
    }

}
