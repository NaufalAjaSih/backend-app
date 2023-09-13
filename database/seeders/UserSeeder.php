<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'phone' => '087694524869',
            'bio' => 'lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'email_verified_at' => now(),
            'password' => Hash::make('user')
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'phone' => '087694524349',
            'bio' => 'lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'email_verified_at' => now(),
            'role' => 'admin',
            'password' => Hash::make('admin')
        ]);

        User::factory()->create([
            'name' => 'Superadmin',
            'email' => 'superadmin@example.com',
            'phone' => '087694764869',
            'bio' => 'lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'email_verified_at' => now(),
            'role' => 'superadmin',
            'password' => Hash::make('superadmin')
        ]);
    }
}
