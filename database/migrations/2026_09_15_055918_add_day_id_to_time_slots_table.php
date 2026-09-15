<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('time_slots', 'day_id')) {
            Schema::table('time_slots', function (Blueprint $table) {
                $table->foreignId('day_id')
                    ->after('id')
                    ->constrained('days')
                    ->nullOnDelete();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('time_slots', 'day_id')) {
            Schema::table('time_slots', function (Blueprint $table) {
                $table->dropForeign(['day_id']);
                $table->dropColumn('day_id');
            });
        }
    }
};