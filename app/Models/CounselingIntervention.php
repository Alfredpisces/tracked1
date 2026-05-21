<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CounselingIntervention extends Model
{
    use HasFactory;

    protected $fillable = [
        'incident_report_id',
        'counselor_id',
        'intervention_type',
        'notes',
        'scheduled_at',
        'completed_at',
        'outcome',
    ];

    protected function casts(): array
    {
        return [
            'scheduled_at' => 'datetime',
            'completed_at' => 'datetime',
        ];
    }

    public function incidentReport(): BelongsTo
    {
        return $this->belongsTo(IncidentReport::class);
    }

    public function counselor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'counselor_id');
    }
}
