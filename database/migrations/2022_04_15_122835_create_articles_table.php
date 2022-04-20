<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    private const TABLE_NAME = 'articles';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(self::TABLE_NAME, static function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');


            // Подключаем категорию из таблицы 'categories'
            // Неотрицательное 'category_id'
            // $table->unsignedBigInteger('category_id');
            // // Делаем индексацию по 'category_id' для оптимизированного(ускоренного) поиска и даём название по конвенции ('article_category_idx')
            // $table->index('category_id', 'article_category_idx');
            // // Обозначаемся, что 'category_id' внешний ключ, даём название ('article_category_fk'), указываем на какую таблицу ссылаемся ('categories') и на какую колонку ссылается ('id')
            // $table->foreign('category_id','article_category_fk')->on('categories')->references('id');


            $table->unsignedInteger('tag_id');
            $table->timestamps();

            // "Мягкое" удаление
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
}
