<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Animal;
use JetBrains\PhpStorm\NoReturn;

//

class AnimalController extends Controller
{
    #[NoReturn] public function index(): void
    {
        $animal_1 = Animal::find(1);
        dump($animal_1);
        echo "</br>";
        $animal_2 = Animal::find(2);
        dump($animal_2);
        echo "</br>";
        dump($animal_2->type);
        echo "</br>";
        dump($animal_2->breed);
        echo "</br>";
        dd($animal_2->description);
        // return 'Create post';
    }

}
