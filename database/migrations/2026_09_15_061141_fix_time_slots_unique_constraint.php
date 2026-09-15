<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('time_slots', function (Blueprint $table) {
            $table->dropUnique('time_slots_nomor_jam_mulai_jam_selesai_unique');

            $table->unique(
                ['day_id', 'nomor'],
                'time_slots_day_id_nomor_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::table('time_slots', function (Blueprint $table) {
            $table->dropUnique('time_slots_day_id_nomor_unique');

            $table->unique(
                ['nomor', 'jam_mulai', 'jam_selesai'],
                'time_slots_nomor_jam_mulai_jam_selesai_unique'
            );
        });
    }
};