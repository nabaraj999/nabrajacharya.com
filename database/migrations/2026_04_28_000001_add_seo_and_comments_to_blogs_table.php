<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->unsignedInteger('comment_count')->default(0)->after('featured_image');
            $table->string('meta_title', 255)->nullable()->after('comment_count');
            $table->text('meta_description')->nullable()->after('meta_title');
            $table->string('meta_keywords', 255)->nullable()->after('meta_description');
            $table->json('faqs')->nullable()->after('meta_keywords');
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn([
                'comment_count',
                'meta_title',
                'meta_description',
                'meta_keywords',
                'faqs',
            ]);
        });
    }
};
