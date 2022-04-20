<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    public function index(): Factory|View|Application
    {
        $comments = Comment::all();

        return view('comments.index', compact('comments'));
    }

    public function create(): Factory|View|Application
    {
        return view('comments.create');
    }

    public function store(): RedirectResponse
    {
        $data = request()->validate([
            'Author' => 'string',
            'text'   => 'string',
        ]);
        Comment::create($data);

        return redirect()->route('comments.index');
    }

    public function show(Comment $comment): Factory|View|Application
    {
        return view('comments.show', compact('comment'));
    }

    public function edit(Comment $comment): Factory|View|Application
    {
        return view('comments.edit', compact('comment'));
    }

    public function update(Comment $comment): RedirectResponse
    {
        $data = request()->validate([
            'Author' => 'string',
            'text'   => 'string',
        ]);
        $comment->update($data);

        return redirect()->route('comments.show', $comment->id);
    }

    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();
        return redirect()->route('comments.index');
    }
}
