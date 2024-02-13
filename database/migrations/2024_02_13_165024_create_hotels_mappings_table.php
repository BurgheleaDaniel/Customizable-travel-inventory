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
        Schema::create('hotels_mappings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('license')->nullable();
            $table->string('address')->nullable();
            $table->decimal('rating', 4,2, true)->nullable();
            $table->unsignedBigInteger('source_id')->nullable();
            $table->timestamps();

            $table->unique(['hotel_id', 'source_id']);

            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->foreign('source_id')->references('id')->on('sources')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels_mappings');
    }
};
