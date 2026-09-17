<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;
public function teachingAssignments(): HasMany
{
    return $this->hasMany(TeachingAssignment::class);
}

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
