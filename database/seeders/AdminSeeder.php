<?php

namespace Database\Seeders;

use App\Enums\Roles;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (! User::where('email', env('ADMIN_EMAIL'))->exists()) {
            User::factory()->withEmail(env('ADMIN_EMAIL'))->create()->syncRoles(Roles::ADMIN);
        }
    }
}
