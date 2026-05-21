<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'employee_id',
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
        'current_tier',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    // Relationship to granular PBAC permissions
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permissions')
                    ->withPivot('granted_at')
                    ->withTimestamps();
    }

    // Helper to check access rights
    public function hasPermissionTo(string $actionName): bool
    {
        // Admins bypass granular checks and can do everything
        if ($this->role === 'admin') {
            return true;
        }

        return $this->permissions()->where('action_name', $actionName)->exists();
    }
}
