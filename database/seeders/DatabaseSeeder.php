<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            RolesSeeder::class,
        ]);

        User::query()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('Admin123$'),
            'email_verified_at' => now(),
        ])->assignRole('admin');
    }
}
