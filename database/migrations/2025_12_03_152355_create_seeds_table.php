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
    Schema::create('seeds', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Seed name
        $table->string('variety'); // Seed variety
        $table->integer('quantity'); // Quantity in stock
        $table->string('supplier'); // Supplier name
        $table->date('received_date'); // Date received
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seeds');
    }
};
