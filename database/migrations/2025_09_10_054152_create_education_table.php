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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('degree', 100);
            $table->string('institution', 100);
            $table->string('image_url', 255)->nullable();
            $table->year('start_year')->nullable();
            $table->year('end_year')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['in_progress', 'completed'])->default('completed');
            $table->timestamps();
            $table->softDeletes();
            $table->index('institution');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
