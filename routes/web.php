<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/page', function () {
    return 'Create page';
});

Route::get('/page_news', function () {
    return 'Create page_news';
});

Route::get('/page_contact', function () {
    return 'Create page_contact';
});

Route::get('/page_about', function () {
    return 'Create page_about';
});

Route::get('/page_catalog', function () {
    return 'Create page_catalog';
});

Route::get('/page_categories', function () {
    return 'Create page_categories';
});

Route::get('/page_blog', function () {
    return 'Create page_blog';
});

Route::get('/page_tags', function () {
    return 'Create page_tags';
});

Route::get('/page_articles', function () {
    return 'Create page_articles';
});
