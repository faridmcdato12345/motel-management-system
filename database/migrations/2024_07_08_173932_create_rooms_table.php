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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('motel_id')->constrained('motels')->onDelete('cascade');
            $table->string('room_number');
            $table->enum('type', ['single', 'double', 'suite']);
            $table->decimal('price_per_night', 8, 2);
            $table->boolean('is_occupied')->default(false);
            $table->timestamps();
            $table->unique(['motel_id', 'room_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
