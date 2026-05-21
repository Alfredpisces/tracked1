<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyLessonLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'reviewer_id',
        'target_date',
        'subject',
        'objectives',
        'content',
        'learning_resources',
        'procedures',
        'reflection',
        'is_ai_passed',
        'status',
        'submitted_at',
    ];

    protected $casts = [
        'target_date' => 'date',
        'is_ai_passed' => 'boolean',
        'submitted_at' => 'datetime',
    ];

    /**
     * Get the teacher who authored the DLL.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Get the school head who reviewed/approved the DLL.
     */
    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }
}
