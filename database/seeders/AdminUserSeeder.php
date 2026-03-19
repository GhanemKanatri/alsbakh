<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@alsbakh.com'],
            [
                'name'     => 'Admin',
                'email'    => 'admin@alsbakh.com',
                'password' => bcrypt('alsbakh2024'),
            ]
        );
    }
}
