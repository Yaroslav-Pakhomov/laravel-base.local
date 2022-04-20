<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    private const TABLE_NAME = 'posts';

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
            $table->string('image')->nullable();

            // Подключаем категорию из таблицы 'categories'
            // Неотрицательное 'category_id'
            $table->unsignedBigInteger('category_id')->nullable();

            // Делаем индексацию по 'category_id' для оптимизированного(ускоренного) поиска и даём название по конвенции ('post_category_idx')
            $table->index('category_id', 'post_category_idx');

            $table->bigInteger('likes')->nullable();
            $table->boolean('is_published')->default(1);
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
