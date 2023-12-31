<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("orders", function (Blueprint $table) {
            $table->bigIncrements('id')->primary;
            $table->string("user_phone_number", 12);
            $table->unsignedBigInteger("food_id");
            $table->string("number");
            $table->string("money");
            $table->boolean('is_processing')->default(true) ;
            $table->timestamps();

            $table->foreign('user_phone_number')->references('phone_number')->on('my_users');
            $table->foreign('food_id')->references('id')->on('foods');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
