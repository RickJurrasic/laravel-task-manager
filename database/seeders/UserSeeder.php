<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'demo@example.com'], // ensures no duplicate
            [
                'name' => 'Demo User',
                'password' => bcrypt('password'), // optional if using auth
            ]
        );
    }
}
