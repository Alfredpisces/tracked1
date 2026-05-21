<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'lrn',
        'first_name',
        'last_name',
        'middle_name',
        'grade_level',
        'section',
        'last_synced_at',
    ];

    protected function casts(): array
    {
        return [
            'last_synced_at' => 'datetime',
        ];
    }

    public function incidentReports(): HasMany
    {
        return $this->hasMany(IncidentReport::class);
    }

    public function unresolvedMajorIncidentReports(): HasMany
    {
        return $this->incidentReports()
            ->where('severity', 'major')
            ->whereNotIn('status', ['resolved', 'closed']);
    }

    public function getFullNameAttribute(): string
    {
        return trim(collect([$this->first_name, $this->middle_name, $this->last_name])->filter()->implode(' '));
    }

    public function isEligibleForGoodMoral(): bool
    {
        return ! $this->unresolvedMajorIncidentReports()->exists();
    }
}
