<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteTableFromDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        // Удаляем таблицу 'animals'
        Schema::dropIfExists('animals');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        // Создаём таблицу 'animals'
        Schema::create('animals', static function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('breed');
            $table->text('description');
            $table->timestamps();

            // "Мягкое" удаление
            $table->softDeletes();
        });
    }
}
