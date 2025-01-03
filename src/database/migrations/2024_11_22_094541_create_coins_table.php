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
        Schema::create('coins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->enum('type', ['bahar', 'emami', 'nim', 'rob', 'gerami']);
            $table->unsignedBigInteger('quantity');
            $table->bigInteger('purchase_price')->default(0);
            $table->date('purchase_time')->nullable();
            $table->mediumText('other')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coins');
    }
};
