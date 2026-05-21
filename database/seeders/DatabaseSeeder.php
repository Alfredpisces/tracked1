<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // The Single Default Master Account
        User::create([
            'employee_id'  => 'SYS-ADMIN-001',
            'first_name'   => 'System',
            'last_name'    => 'Administrator',
            'email'        => 'admin@tracked.edu.ph',
            'password'     => Hash::make('password123'), // Default secure password
            'role'         => 'admin',
            'current_tier' => null, // Admin is not evaluated by DSS
            'is_active'    => true,
        ]);
    }
}
