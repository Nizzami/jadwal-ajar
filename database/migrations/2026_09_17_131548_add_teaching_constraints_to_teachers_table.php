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
    Schema::table('teachers', function (Blueprint $table) {
        $table->unsignedSmallInteger('target_jp_per_minggu')->default(0);
        $table->unsignedTinyInteger('maksimal_jp_per_hari')->default(0);
        $table->unsignedTinyInteger('maksimal_jp_berturut_turut')->default(0);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('teachers', function (Blueprint $table) {
        $table->dropColumn([
            'target_jp_per_minggu',
            'maksimal_jp_per_hari',
            'maksimal_jp_berturut_turut',
        ]);
    });
}
};
