<?php

declare(strict_types = 1);


namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse as RedirectResponseAlias;

class UpdateController extends Controller
{
    /**
     * @param Comment $comment
     * @return RedirectResponseAlias
     */
    public function __invoke(Comment $comment): RedirectResponseAlias
    {
        $data = request()->validate([
            'Author' => 'string',
            'text'   => 'string',
        ]);
        $comment->update($data);

        return redirect()->route('comments.show', $comment->id);
    }
}
