<?php

declare(strict_types = 1);


namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Category $category): RedirectResponse
    {
        $data = $request->validated();
        $category->update($data);

        return redirect()->route('categories.index');
    }
}
