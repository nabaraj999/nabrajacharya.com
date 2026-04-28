<?php

use App\Models\Project;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('slug', 160)->nullable()->after('title');
        });

        Project::withTrashed()->get()->each(function (Project $project): void {
            $baseSlug = Str::slug($project->title) ?: 'project';
            $slug = $baseSlug;
            $counter = 2;

            while (
                Project::withTrashed()
                    ->where('id', '!=', $project->id)
                    ->where('slug', $slug)
                    ->exists()
            ) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $project->forceFill(['slug' => $slug])->saveQuietly();
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->string('slug', 160)->nullable(false)->change();
            $table->unique('slug');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn('slug');
        });
    }
};
