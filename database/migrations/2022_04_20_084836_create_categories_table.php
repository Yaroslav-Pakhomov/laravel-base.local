<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('categories', static function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();

            // "Мягкое" удаление
            $table->softDeletes();
        });

        // Внешние ключи лучше писать в таблице к которой они привязываются, чтобы быть уверенным, что она уже точно создана и просто указать в названии к какой таблице относиться данный внешний ключ.
        Schema::table('posts', static function(Blueprint $table) {
            // Обозначаемся, что 'category_id' внешний ключ, даём название ('post_category_fk'), ссылается на колонку ('id') в таблиц ('categories')
            $table->foreign('category_id', 'post_category_fk')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
}
