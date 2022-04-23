<?php

declare(strict_types = 1);

use Illuminate\Support\Facades\Auth;
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
Route::group(['namespace' => 'Post'], static function () {
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
    // Получить, либо создать пост
    Route::get('/post/first_or_create', 'FirstOrCreateController')->name('post.first_or_create');
    // Обновить, либо создать пост
    Route::get('/post/update_or_create', 'UpdateOrCreateController')->name('post.update_or_create');
});


// Article
Route::group(['namespace' => 'Article'], static function () {
    // Страница со статьями
    Route::get('/article', 'IndexController')->name('article.index');
    // Страница создания статьи
    Route::get('/article/create', 'CreateController')->name('article.create');
    // Отправка формы создания поста
    Route::post('/article', 'StoreController')->name('article.store');
    // Страница статьи
    Route::get('/article/{article}', 'ShowController')->name('article.show');
    // Редактирование статьи
    Route::get('/article/{article}/edit', 'EditController')->name('article.edit');
    // Отправка формы редактирования статьи
    Route::patch('/article/{article}', 'UpdateController')->name('article.update');
    // Удаление статьи
    Route::delete('/article/{article}', 'DestroyController')->name('article.delete');
});


//Categories
Route::group(['namespace' => 'Category'], static function () {
    // Страница с категориями
    Route::get('/categories', 'IndexController')->name('categories.index');
    // Страница создания категории
    Route::get('/categories/create', 'CreateController')->name('categories.create');
    // Отправка формы создания категории
    Route::post('/categories', 'StoreController')->name('categories.store');
    // Страница категории
    Route::get('/categories/{category}', 'ShowController')->name('categories.show');
    // Редактирование категории
    Route::get('/categories/{category}/edit', 'EditController')->name('categories.edit');
    // Отправка формы редактирования категории
    Route::patch('/categories/{category}', 'UpdateController')->name('categories.update');
    // Удаление категории
    Route::delete('/categories/{category}', 'DestroyController')->name('categories.delete');
});


//Comments
Route::group(['namespace' => 'Comment'], static function () {
    // Страница с комментариями
    Route::get('/comments', 'IndexController')->name('comments.index');
    // Страница с формой создания комментария
    Route::get('/comments/create', 'CreateController')->name('comments.create');
    // Отправка формы создания комментария
    Route::post('/comments', 'StoreController')->name('comments.store');
    // Страница комментария
    Route::get('/comments/{comment}', 'ShowController')->name('comments.show');
    // Страница с формой редактирования комментария
    Route::get('/comments/{comment}/edit', 'EditController')->name('comments.edit');
    // Отправка формы редактирования комментария
    Route::patch('/comments/{comment}', 'UpdateController')->name('comments.update');
    // Удаление комментария
    Route::delete('/comments/{comment}', 'DestroyController')->name('comments.delete');
});


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


// Admin
Route::group(['namespace' => 'Admin', 'middleware' => 'admin'], static function () {
    Route::get('/admin', 'IndexController')->name('admin.index');
    Route::group(['namespace' => 'Post', 'prefix' => '/admin'], static function () {
        Route::get('/post', 'IndexController')->name('admin.post.index');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
