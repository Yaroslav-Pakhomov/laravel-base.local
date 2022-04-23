<?php

declare(strict_types = 1);


namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        $data = request()->validate([
            'Author' => 'string',
            'text'   => 'string',
        ]);
        Comment::create($data);

        return redirect()->route('comments.index');
    }
}
