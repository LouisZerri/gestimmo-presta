<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->index(['is_published', 'published_at'], 'articles_published_index');
            $table->index('category', 'articles_category_index');
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->index(['is_published', 'page', 'sort_order'], 'testimonials_page_index');
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropIndex('articles_published_index');
            $table->dropIndex('articles_category_index');
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropIndex('testimonials_page_index');
        });
    }
};
