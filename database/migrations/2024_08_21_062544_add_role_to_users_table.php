<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First, add the 'role' column to the 'users' table
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->nullable()->default('user'); // Add the 'role' column
        });

        // Then, update existing records where 'role' is null
        DB::table('users')->whereNull('role')->update(['role' => 'user']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // To reverse the migration, drop the 'role' column
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
