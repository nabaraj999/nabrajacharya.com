<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 150);
            $table->string('position', 150);
            $table->string('company_url', 255)->nullable();
            $table->string('company_logo', 255)->nullable();
            $table->string('location', 100)->nullable();
            $table->string('employment_type', 50)->nullable(); // Full-time, Part-time, Contract, Freelance
            $table->date('start_date');
            $table->date('end_date')->nullable(); // null = present
            $table->boolean('is_current')->default(false);
            $table->text('description')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
