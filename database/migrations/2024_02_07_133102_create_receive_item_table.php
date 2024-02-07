<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    { 
        Schema::create('receive_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('order_item')->cascadeOnDelete();
            $table->foreignId('receive_cash_id')->constrained('receive_cashes')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receive_item');
    }
};