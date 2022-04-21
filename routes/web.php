<?php

declare(strict_types = 1);

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


Route::group(['namespace' => 'Post'], static function () {
    // Post
    // Страница с постами
    Route::get('/post', 'IndexController')->name('post.index');
    // Создание поста
    Route::get('/post/create', 'CreateController')->name('post.create');
    // Отправка формы поста
    Route::post('/post', 'StoreController')->name('post.store');
    // Страница поста
    Route::get('/post/{post}', 'ShowController')->name('post.show');
    // Страница редактирования поста
    Route::get('/post/{post}/edit', 'EditController')->name('post.edit');
    // Обновление поста
    Route::patch('/post/{post}', 'UpdateController')->name('post.update');
    // Удаление поста
    Route::delete('/post/{post}', 'DestroyController')->name('post.delete');

});

// Получить, либо создать пост
Route::get('/post/first_or_create', 'PostController@first-or-create');
// Обновить, либо создать пост
Route::get('/post/update_or_create', 'PostController@update-or-create');

// Article
// Страница со статьями
Route::get('/article', 'ArticleController@index')->name('article.index');
// Страница создания статьи
Route::get('/article/create', 'ArticleController@create')->name('article.create');
// Отправка формы создания поста
Route::post('/article', 'ArticleController@store')->name('article.store');
// Страница статьи
Route::get('/article/{article}', 'ArticleController@show')->name('article.show');
// Редактирование статьи
Route::get('/article/{article}/edit', 'ArticleController@edit')->name('article.edit');
// Отправка формы редактирования статьи
Route::patch('/article/{article}', 'ArticleController@update')->name('article.update');
// Удаление статьи
Route::delete('/article/{article}', 'ArticleController@destroy')->name('article.delete');


//Categories
// Страница с категориями
Route::get('/categories', 'CategoryController@index')->name('categories.index');
// Страница создания категории
Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
// Отправка формы создания категории
Route::post('/categories', 'CategoryController@store')->name('categories.store');
// Страница категории
Route::get('/categories/{category}', 'CategoryController@show')->name('categories.show');
// Редактирование категории
Route::get('/categories/{category}/edit', 'CategoryController@edit')->name('categories.edit');
// Отправка формы редактирования категории
Route::patch('/categories/{category}', 'CategoryController@update')->name('categories.update');
// Удаление категории
Route::delete('/categories/{category}', 'CategoryController@destroy')->name('categories.delete');


//Comments
// Страница с комментариями
Route::get('/comments', 'CommentController@index')->name('comments.index');
// Страница с формой создания комментария
Route::get('/comments/create', 'CommentController@create')->name('comments.create');
// Отправка формы создания комментария
Route::post('/comments', 'CommentController@store')->name('comments.store');
// Страница комментария
Route::get('/comments/{comment}', 'CommentController@show')->name('comments.show');
// Страница с формой редактирования комментария
Route::get('/comments/{comment}/edit', 'CommentController@edit')->name('comments.edit');
// Отправка формы редактирования комментария
Route::patch('/comments/{comment}', 'CommentController@update')->name('comments.update');
// Удаление комментария
Route::delete('/comments/{comment}', 'CommentController@destroy')->name('comments.delete');


// Animal
Route::get('/animal', 'AnimalController@index');


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
