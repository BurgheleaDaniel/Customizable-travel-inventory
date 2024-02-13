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
        Schema::create('facility_hotel_mappings', function (Blueprint $table) {
            $table->foreignId('facility_id')->constrained();
            $table->foreignId('hotels_mappings_id')->constrained();
            $table->primary(['facility_id', 'hotels_mappings_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facility_hotel_mappings');
    }
};
