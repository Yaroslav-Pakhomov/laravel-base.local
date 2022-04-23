<?php

declare(strict_types = 1);


namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        $data = request()->validate([
            'title' => 'string'
        ]);
        Category::create($data);

        return redirect()->route('categories.index');
    }
}
