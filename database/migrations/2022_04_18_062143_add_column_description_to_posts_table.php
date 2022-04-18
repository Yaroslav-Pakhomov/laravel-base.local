<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnDescriptionToPostsTable extends Migration
{
    private const TABLE_NAME = 'posts';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table(self::TABLE_NAME, static function (Blueprint $table) {
            $table->text('description')->nullable()->after('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table(self::TABLE_NAME, static function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
}
