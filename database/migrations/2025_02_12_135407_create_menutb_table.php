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
        Schema::create('menutb', function (Blueprint $table) {
            $table->id('menu_id');
            // from category table
            $table->foreignId('fk_categ_id');
            $table->string('item_name');
            $table->text('desc');
            $table->decimal('price');
            $table->tinyInteger('availability');
            $table->timestamp('created_at')->nullable();

            $table->foreign('fk_categ_id')->references('categ_id')->on('categorytb')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menutb');
    }
};
