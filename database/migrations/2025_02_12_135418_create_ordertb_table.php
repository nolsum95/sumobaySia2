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
        Schema::create('ordertb', function (Blueprint $table) {
            $table->id('order_id');
            $table->foreignId('fk_menu_id');
            $table->foreignId('fk_cust_id');

            $table->decimal('tot_amount');
            $table->string('pickup_date');
            $table->string('date_order');
            $table->string('payment_status');
            $table->integer('quantity');


            $table->foreign('fk_menu_id')->references('menu_id')->on('menutb')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('fk_cust_id')->references('cust_id')->on('customertb')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordertb');
    }
};
