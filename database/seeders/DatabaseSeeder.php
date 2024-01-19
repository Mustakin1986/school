<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Teacher',
            'email' => 'teacher@gmail.com',
            'password' => Hash::make('1234567'),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Student',
            'email' => 'student@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Parent',
            'email' => 'parent@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
