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

Route::get('/', static function () {
    return view('welcome');
});

Route::get('/page', static function () {
    return 'Create page';
});

Route::get('/page_news', static function () {
    return 'Create page_news';
});

Route::get('/page_contact', static function () {
    return 'Create page_contact';
});

Route::get('/page_about', static function () {
    return 'Create page_about';
});

Route::get('/page_catalog', static function () {
    return 'Create page_catalog';
});

Route::get('/page_categories', static function () {
    return 'Create page_categories';
});

Route::get('/page_blog', static function () {
    return 'Create page_blog';
});

Route::get('/page_tags', static function () {
    return 'Create page_tags';
});

Route::get('/page_articles', static function () {
    return 'Create page_articles';
});
