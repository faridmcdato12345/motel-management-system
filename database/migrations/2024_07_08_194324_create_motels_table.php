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
        Schema::create('motels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manager_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('motel_name')->unique();
            $table->string('motel_address');
            $table->string('phone_number');
            $table->string('email_address')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motels');
    }
};
