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
        Schema::create('time_slots', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('nomor');
            $table->string('nama', 50);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('jenis', 30)->default('pelajaran');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->unique(['nomor', 'jam_mulai', 'jam_selesai']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_slots');
    }
};