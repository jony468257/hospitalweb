<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('doctor_hospital', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->constrained()->cascadeOnDelete();
            $table->foreignId('hospital_id')->constrained()->cascadeOnDelete();
            $table->string('room_no')->nullable();
            $table->timestamps();

            // Composite Index
            $table->index(['doctor_id', 'hospital_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctor_hospital');
    }
};
