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
        Schema::create('food_order', function (Blueprint $table) {
           
            $table->unsignedBigInteger('food_id');
            $table->unsignedBigInteger('order_id');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->primary(['food_id','order_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
