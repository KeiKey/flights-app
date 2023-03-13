<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Role::query()
            ->create(['name' => 'admin', 'guard_name' => 'web'])
            ->givePermissionTo(['manage_user', 'manage_flight', 'manage_company', 'manage_season']);

        Role::query()
            ->create(['name' => 'user', 'guard_name' => 'web'])
            ->givePermissionTo(['manage_flight']);
    }
}
