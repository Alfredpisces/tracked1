<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CotRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'school_head_id',
        'rating_date',
        'score',
        'remarks',
    ];

    protected function casts(): array
    {
        return [
            'rating_date' => 'date',
            'score' => 'decimal:2',
        ];
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function schoolHead(): BelongsTo
    {
        return $this->belongsTo(User::class, 'school_head_id');
    }
}
