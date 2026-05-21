<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. System Administrator
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

        // 2. School Head / Principal
        User::create([
            'employee_id'  => 'EMP-0002',
            'first_name'   => 'Roberto',
            'last_name'    => 'Aquino',
            'email'        => 'schoolhead@deped.edu.ph',
            'password'     => Hash::make('password123'),
            'role'         => 'school_head',
            'current_tier' => 'highly_proficient', // Used by the DSS Engine
            'is_active'    => true,
        ]);

        // 3. Guidance Counselor
        User::create([
            'employee_id'  => 'EMP-0003',
            'first_name'   => 'Grace',
            'last_name'    => 'Custodio',
            'email'        => 'counselor@deped.edu.ph',
            'password'     => Hash::make('password123'),
            'role'         => 'counselor',
            'current_tier' => 'proficient',
            'is_active'    => true,
        ]);

        // 4. Default Teacher
        User::create([
            'employee_id'  => 'EMP-1001',
            'first_name'   => 'Juan',
            'last_name'    => 'Dela Cruz',
            'email'        => 'teacher@deped.edu.ph',
            'password'     => Hash::make('password123'),
            'role'         => 'teacher',
            'current_tier' => 'proficient',
            'is_active'    => true,
        ]);
    }
}
