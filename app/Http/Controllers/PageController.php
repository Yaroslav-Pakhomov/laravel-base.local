<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(): string
    {
        return 'Create page';
    }

    public function news(): string
    {
        return 'Create page_news';
    }

    public function contact(): string
    {
        return 'Create page_contact';
    }

    public function about(): string
    {
        return 'Create page_about';
    }

    public function catalog(): string
    {
        return 'Create page_catalog';
    }

    public function categories(): string
    {
        return 'Create page_categories';
    }

    public function blog(): string
    {
        return 'Create page_blog';
    }

    public function tags(): string
    {
        return 'Create page_tags';
    }

    public function articles(): string
    {
        return 'Create page_articles';
    }

}
