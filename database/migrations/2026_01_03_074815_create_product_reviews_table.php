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
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
    $table->unsignedBigInteger('product_id');
    $table->unsignedBigInteger('user_id')->nullable();
    $table->string('name')->nullable(); // للضيف
    $table->string('email')->nullable();
    $table->tinyInteger('rating')->default(5); // 1–5
    $table->text('comment')->nullable();
    $table->boolean('approved')->default(false);
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_reviews');
    }
};
