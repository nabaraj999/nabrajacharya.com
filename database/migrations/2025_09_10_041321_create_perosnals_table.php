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
        Schema::create('perosnals', function (Blueprint $table) {
           $table->id();
            $table->string('brand_name', 100);
            $table->string('logo_url', 255)->nullable();
            $table->string('facebook_url', 255)->nullable();
            $table->string('instagram_url', 255)->nullable();
            $table->string('github_url', 255)->nullable();
            $table->string('email', 100);
            $table->string('phone_number', 20)->nullable();
            $table->string('location', 100)->nullable();
            $table->text('description')->nullable();
            $table->text('about_me')->nullable();
            $table->string('profile_photo', 255)->nullable();
            $table->text('about_description')->nullable();
            $table->integer('years_experience')->nullable();
            $table->integer('completed_projects')->nullable();
            $table->integer('happy_clients')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perosnals');
    }
};
