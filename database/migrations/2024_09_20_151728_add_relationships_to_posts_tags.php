<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts_tags', function (Blueprint $table) {
            $table->foreign('posts_id')->references('id')->on('categories');
            $table->foreign('tags_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts_tags', function (Blueprint $table) {
            if (Schema::hasColumn('posts_tags', 'posts_id')) {
                $table->dropForeign(['posts_id']);
                $table->dropColumn('posts_id');
            }

            if (Schema::hasColumn('posts_tags', 'tags_id')) {
                $table->dropForeign(['tags_id']);
                $table->dropColumn('tags_id');
            }
        });
    }
};
