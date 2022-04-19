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

Route::get('/page', 'PageController@index');

Route::get('/page_news', 'PAgeController@news');

Route::get('page_contact', 'PageController@contact');

Route::get('/page_contact', 'PageController@about');

Route::get('/page_catalog', 'PageController@catalog');

Route::get('/page_categories', 'PageController@categories');

Route::get('/page_blog', 'PageController@blog');

Route::get('/page_tags', "PageController@tags");

Route::get('/page_articles', 'PageController@articles');

// Post
Route::get('/post', 'PostController@index')->name('post.index');
Route::get('/post/create', 'PostController@create');
Route::get('/post/update', 'PostController@update');
Route::get('/post/delete', 'PostController@delete');
Route::get('/post/first_or_create', 'PostController@firstOrCreate');
Route::get('/post/update_or_create', 'PostController@updateOrCreate');

// Animal
Route::get('/animal', 'AnimalController@index');

// Article
Route::get('/article', 'ArticleController@index');
Route::get('/article/create', 'ArticleController@create');

// Catalog
Route::get('/catalog', 'CatalogController@index');

// Tag
Route::get('/tag', 'TagController@index');


// About
Route::get('/about', 'AboutController@index')->name('about.index');

// Contacts
Route::get('/contacts', 'ContactController@index')->name('contact.index');

// Main
Route::get('/main', 'MainController@index')->name('main.index');
