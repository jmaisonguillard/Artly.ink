<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Client',
            'last_name' => 'User',
            'email' => 'client@artly.ink',
            'password' => bcrypt('secret'),
            'type' => 'client',
            'display_name' => 'Client User'
        ]);

        User::create([
            'first_name' => 'Artist',
            'last_name' => 'User',
            'email' => 'artist@artly.ink',
            'password' => bcrypt('secret'),
            'type' => 'artist',
            'display_name' => 'Artist User'
        ]);
    }
}
