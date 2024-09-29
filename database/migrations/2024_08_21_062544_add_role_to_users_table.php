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
        // Update the 'role' column for users who have a NULL value
        DB::table('users')->whereNull('role')->update(['role' => 'user']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // You may not be able to 'unset' a column in MySQL,
        // but you can set it to NULL
        DB::table('users')->whereNotNull('role')->update(['role' => null]);
    }
};
