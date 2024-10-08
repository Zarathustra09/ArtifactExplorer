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
        User::create([
            'name' => 'Joshua Pardo',
            'email' => 'joshua.pardo30@gmail.com',
            'password' => Hash::make('Test@123')
        ]);

        User::create([
            'name' => 'Mervin Caballero',
            'email' => 'jmeva.quimio12345@gmail.com',
            'password' => Hash::make('Caballero@123')
        ]);

    }
}
