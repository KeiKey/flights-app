<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'manage_log',     'guard_name' => 'web'],
            ['name' => 'manage_user',    'guard_name' => 'web'],
            ['name' => 'manage_flight',  'guard_name' => 'web'],
            ['name' => 'manage_company', 'guard_name' => 'web'],
            ['name' => 'manage_season',  'guard_name' => 'web']
        ];

        Permission::query()->insert($permissions);
    }
}
