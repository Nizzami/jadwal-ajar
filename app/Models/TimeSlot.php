<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TimeSlot extends Model
{
    use HasFactory;

    protected $fillable = [
        'day_id',
        'nomor',
        'nama',
        'jam_mulai',
        'jam_selesai',
        'jenis',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'jam_mulai' => 'datetime:H:i',
        'jam_selesai' => 'datetime:H:i',
    ];

    public function day(): BelongsTo
    {
        return $this->belongsTo(Day::class);
    }
}