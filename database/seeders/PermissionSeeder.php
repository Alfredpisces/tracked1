<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = collect([
            ['module_name' => 'personnel', 'action_name' => 'manage_personnel'],
            ['module_name' => 'lis_sync', 'action_name' => 'run_lis_sync'],
            ['module_name' => 'inventory', 'action_name' => 'manage_inventory'],
            ['module_name' => 'clearance', 'action_name' => 'review_clearance'],
            ['module_name' => 'dll', 'action_name' => 'create_dll'],
            ['module_name' => 'performance', 'action_name' => 'manage_performance'],
            ['module_name' => 'incidents', 'action_name' => 'report_incident'],
            ['module_name' => 'inventory', 'action_name' => 'view_inventory'],
            ['module_name' => 'incidents', 'action_name' => 'review_incidents'],
            ['module_name' => 'good_moral', 'action_name' => 'manage_good_moral'],
            ['module_name' => 'violators', 'action_name' => 'view_violators'],
            ['module_name' => 'dll', 'action_name' => 'review_dll'],
            ['module_name' => 'dss', 'action_name' => 'manage_dss'],
            ['module_name' => 'behavioral_oversight', 'action_name' => 'review_behavioral_oversight'],
            ['module_name' => 'inventory_oversight', 'action_name' => 'review_inventory_oversight'],
            ['module_name' => 'reports', 'action_name' => 'generate_reports'],
        ])->map(fn (array $attributes) => Permission::firstOrCreate($attributes));

        $roleMap = [
            'school_head' => ['review_dll', 'manage_dss', 'review_behavioral_oversight', 'review_inventory_oversight', 'generate_reports'],
            'counselor' => ['review_incidents', 'manage_good_moral', 'view_violators'],
            'teacher' => ['create_dll', 'manage_performance', 'report_incident', 'view_inventory'],
        ];

        foreach ($roleMap as $role => $actionNames) {
            User::query()->where('role', $role)->get()->each(function (User $user) use ($permissions, $actionNames) {
                $ids = $permissions->whereIn('action_name', $actionNames)->pluck('id')->all();
                $user->permissions()->syncWithoutDetaching($ids);
            });
        }
    }
}
