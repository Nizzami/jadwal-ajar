<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AcademicYear extends Model
{
    use HasFactory;
public function teachingAssignments(): HasMany
{
    return $this->hasMany(TeachingAssignment::class);
}

    protected $fillable = [
        'tahun_pelajaran',
        'semester',
        'status',
    ];

    protected $casts = [
        'semester' => 'integer',
        'status' => 'boolean',
    ];
}
