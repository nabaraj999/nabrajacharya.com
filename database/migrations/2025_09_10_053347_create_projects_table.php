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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->string('image_url', 255)->nullable();
            $table->string('project_url', 255)->nullable();
            $table->date('project_start_date')->nullable();
            $table->date('completion_date')->nullable();
            $table->enum('status', ['in_progress', 'completed', 'on_hold'])->default('in_progress');
            $table->softDeletes();
            $table->index('project_url');
            $table->index('completion_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
