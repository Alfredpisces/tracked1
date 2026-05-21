<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'serial_number',
        'asset_type',
        'condition_status',
        'status',
        'acquisition_date',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'acquisition_date' => 'date',
        ];
    }

    public function assignments(): HasMany
    {
        return $this->hasMany(AssetAssignment::class);
    }

    public function currentAssignment(): HasOne
    {
        return $this->hasOne(AssetAssignment::class)->whereNull('released_at')->latestOfMany('assigned_at');
    }

    public function hasUnresolvedAccountability(): bool
    {
        return in_array($this->condition_status, ['damaged', 'lost'], true)
            && $this->currentAssignment()->exists();
    }
}
