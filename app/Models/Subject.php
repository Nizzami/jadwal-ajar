<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama',
        'jumlah_jp_per_minggu',
        'jenis',
        'prioritas',
        'status',
    ];

    protected $casts = [
        'jumlah_jp_per_minggu' => 'integer',
        'prioritas' => 'integer',
        'status' => 'boolean',
    ];
}
