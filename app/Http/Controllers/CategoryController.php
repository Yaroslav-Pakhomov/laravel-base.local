<?php

declare(strict_types = 1);

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function index(): Factory|View|Application
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function create(): Factory|View|Application
    {
        return view('categories.create');
    }

    public function store(): RedirectResponse
    {
        $data = request()->validate([
            'title' => 'string'
        ]);

        Category::create($data);
        return redirect()->route('categories.index');
    }

    public function show(Category $category): Factory|View|Application
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category): Factory|View|Application
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Category $category): RedirectResponse
    {
        $data = request()->validate([
            'title' => 'string',
        ]);
        $category->update($data);

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
