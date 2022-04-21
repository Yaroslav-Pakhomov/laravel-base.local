<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWritersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('writers', static function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('image')->nullable();
            $table->bigInteger('likes')->nullable();
            $table->boolean('is_published')->default(1);
            $table->timestamps();

            $table->softDeletes();

            // По конвенции Laravel создаём series_id (foreign key называть, как модель с которой соединяем)
            $table->unsignedBigInteger('series_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('writers');
    }
}
