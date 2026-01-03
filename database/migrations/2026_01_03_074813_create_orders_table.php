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
        Schema::create('orders', function (Blueprint $table) {
              $table->id();
    $table->unsignedBigInteger('user_id');
    $table->decimal('total',12,2);
    $table->decimal('shipping',12,2)->default(0);
    $table->decimal('vat',12,2)->default(0);
    $table->string('currency')->default('SAR');
    $table->enum('status',['pending','paid','shipped','completed','cancelled'])->default('pending');
    $table->timestamps();
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
