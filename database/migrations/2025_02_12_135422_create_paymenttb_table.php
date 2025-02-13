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
        Schema::create('paymenttb', function (Blueprint $table) {
            $table->id('payment_id');
            $table->foreignId('fk_order_id');
            $table->foreignId('fk_cust_id');
            $table->string('trans_date');
            $table->decimal('amount');
            $table->string('payment_meth');
            $table->string('payment_stats');

            $table->foreign('fk_order_id')->references('order_id')->on('ordertb')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('fk_cust_id')->references('cust_id')->on('customertb')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paymenttb');
    }
};
