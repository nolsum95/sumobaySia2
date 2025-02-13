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
        Schema::create('feedbacktb', function (Blueprint $table) {
            $table->id('feedback_id');
            $table->foreignId('fk_cust_id');
            $table->foreignId('fk_order_id');
            $table->text('comment');
            $table->decimal('ratings');
            $table->timestamps();

            $table->foreign('fk_cust_id')->references('cust_id')->on('customertb')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('fk_order_id')->references('order_id')->on('ordertb')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacktb');
    }
};
