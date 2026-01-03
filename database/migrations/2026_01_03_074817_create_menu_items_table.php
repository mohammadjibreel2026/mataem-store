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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
    $table->unsignedBigInteger('menu_id');
    $table->unsignedBigInteger('parent_id')->nullable();
    $table->string('type'); // page, category, custom_link
    $table->string('link')->nullable();
    $table->integer('sort_order')->default(0);
    $table->boolean('active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
