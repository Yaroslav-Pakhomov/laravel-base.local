<?php

declare(strict_types = 1);


namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class EditController extends Controller
{
    public function __invoke(Category $category): Factory|View|Application
    {
        return view('categories.edit', compact('category'));
    }
}
