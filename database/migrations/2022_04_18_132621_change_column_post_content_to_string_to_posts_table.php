<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnPostContentToStringToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('posts', static function (Blueprint $table) {
            // Меняем текущий тип данных на 'string'
            $table->string('post_content')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('posts', static function (Blueprint $table) {
            // Меняем текущий тип данных на 'string'
            $table->text('post_content')->change();
        });
    }
}
