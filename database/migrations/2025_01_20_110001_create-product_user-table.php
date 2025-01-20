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
        //
        Schema::create('product_user', function (Blueprint $table) {
            /* $table->integer('product_id');
            $table->integer('user_id'); */
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // FK verso la tabella users
            $table->foreignId('product_id')->constrained()->onDelete('cascade');  // FK verso la tabella products
            $table->integer('quantity');
            $table->integer('status');
            $table->timestamp('purchased_at')->default(now());  // Data di acquisto
            $table->primary(['user_id', 'product_id']);  // Chiave primaria composta
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('product_users');
    }
};
