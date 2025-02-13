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
        Schema::create('customertb', function (Blueprint $table) {
            $table->id('cust_id');
            // fk
            $table->foreignId('fk_user_id');

            $table->string('cust_name');
            $table->integer('contact_no');
            $table->string('address');
            $table->string('email_address');
            $table->text('dietary_preferences');
            $table->string('history');
            $table->timestamp('created_at')->nullable();

            $table->foreign('fk_user_id')->references('user_id')->on('usertb')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customertb');
    }
};
