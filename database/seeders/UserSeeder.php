<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
  // Create a regular user
  User::create([
    'name' => 'Regular User',
    'email' => 'user@example.com',
    'password' => Hash::make('password'),
]);    }
}
