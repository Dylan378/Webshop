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
        Schema::create('oders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); 
            $table->string('stripe_checkout_session_id');
            $table->integer('amount_shipping')->default(0);
            $table->integer('amount_discount')->default(0);
            $table->integer('amount_subtotal')->default(0);
            $table->integer('amount_total')->default(0);
            $table->json('billing_address')->default(0);
            $table->json('shipping_address')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oders');
    }
};
