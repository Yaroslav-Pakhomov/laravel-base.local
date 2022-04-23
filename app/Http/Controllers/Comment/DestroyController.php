<?php

declare(strict_types = 1);


namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;

class DestroyController extends Controller
{
    public function __invoke(Comment $comment): RedirectResponse
    {
        $comment->delete();

        return redirect()->route('comments.index');
    }
}
