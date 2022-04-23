<?php

declare(strict_types = 1);


namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\UpdateRequest;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse as RedirectResponseAlias;

class UpdateController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param Comment $comment
     * @return RedirectResponseAlias
     */
    public function __invoke(UpdateRequest $request, Comment $comment): RedirectResponseAlias
    {
        $data = $request->validated();
        $comment->update($data);

        return redirect()->route('comments.show', $comment->id);
    }
}
