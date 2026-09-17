<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kelas extends Model
{
    use HasFactory;
public function teachingAssignments(): HasMany
{
    return $this->hasMany(TeachingAssignment::class);
}

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
