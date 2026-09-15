<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_guru',
        'nama',
        'status',
        'target_jp_per_minggu',
        'maksimal_jp_per_hari',
        'maksimal_jp_berturut_turut',
    ];

    protected $casts = [
        'status' => 'boolean',
        'target_jp_per_minggu' => 'integer',
        'maksimal_jp_per_hari' => 'integer',
        'maksimal_jp_berturut_turut' => 'integer',
    ];
}
