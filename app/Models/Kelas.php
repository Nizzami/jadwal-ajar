<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'tingkat',
        'nama_kelas',
        'jurusan',
        'jumlah_siswa',
        'wali_kelas',
        'status',
    ];

    protected $casts = [
        'tingkat' => 'integer',
        'jumlah_siswa' => 'integer',
        'status' => 'boolean',
    ];
}
