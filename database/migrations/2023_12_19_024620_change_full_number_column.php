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
        Schema::table('my_users', function (Blueprint $table) {
            $table->renameColumn('full_number', 'full_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('my_users', function (Blueprint $table) {
            $table->renameColumn('full_name', 'full_number');
        });
    }
};
