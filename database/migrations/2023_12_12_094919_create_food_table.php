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
        Schema::create("foods", function (Blueprint $table) {
            $table->bigIncrements('id')->primary;
            $table->string('name',255);
            $table->unsignedBigInteger('group_id');
            $table->string('money',255);
            $table->boolean('is_active')->default(false);
            $table->text('how_to_make');
            $table->foreign('group_id')->references('id')->on('foods_groups');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foods');
    }
};
