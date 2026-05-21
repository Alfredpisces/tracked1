<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfessionalGrowth extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'title',
        'date_attended',
        'points',
        'certificate_path',
        'verification_status',
        'verified_by',
        'verified_at',
    ];

    protected function casts(): array
    {
        return [
            'date_attended' => 'date',
            'points' => 'decimal:2',
            'verified_at' => 'datetime',
        ];
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function verifier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
}
