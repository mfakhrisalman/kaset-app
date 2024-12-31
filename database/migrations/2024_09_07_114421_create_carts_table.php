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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('product_id')->nullable();
            $table->integer('accessory_id')->nullable();
            $table->integer('quantity');
            $table->string('deliver')->nullable();
            $table->string('address')->nullable();
            $table->string('receipt')->nullable();
            $table->string('total')->nullable();
            $table->string('no_transaksi')->nullable();
            $table->string('ekspedisi')->nullable();
            $table->integer('ongkir')->nullable();
            $table->string('resi')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
