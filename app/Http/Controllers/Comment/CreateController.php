<?php

declare(strict_types = 1);


namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CreateController extends Controller
{
    public function __invoke(): Factory|View|Application
    {
        return view('comments.create');
    }
}
