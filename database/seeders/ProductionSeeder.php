<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate([
            'name' => 'Darsya Dev',
            'phone' => '1234567890',
            'email' => 'darsya.dev@gmail.com',
            'password' => '$2y$12$lW7odK1q42qgzjCaJd0N9Ofh9mN9bfV1mPO9rMyOXjXHkIRtIz8mS',
            'role' => 'admin',
        ]);
    }
}
