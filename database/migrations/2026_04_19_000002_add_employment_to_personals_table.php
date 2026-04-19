<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('personals', function (Blueprint $table) {
            $table->string('current_company')->nullable()->after('happy_clients');
            $table->string('current_company_url')->nullable()->after('current_company');
            $table->string('current_role')->nullable()->after('current_company_url');
            $table->date('current_role_start')->nullable()->after('current_role');
            $table->string('linkedin_url')->nullable()->after('current_role_start');
        });
    }

    public function down(): void
    {
        Schema::table('personals', function (Blueprint $table) {
            $table->dropColumn(['current_company', 'current_company_url', 'current_role', 'current_role_start', 'linkedin_url']);
        });
    }
};
