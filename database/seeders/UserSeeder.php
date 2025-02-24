<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin users
        $admins = [
            [
                'name' => 'Budi Santoso',
                'email' => 'admin@example.com',
                'phone' => '081234567890',
            ],
            [
                'name' => 'Dewi Kusuma',
                'email' => 'dewi.kusuma@example.com',
                'phone' => '081234567891',
            ],
        ];

        foreach ($admins as $admin) {
            User::create([
                'name' => $admin['name'],
                'email' => $admin['email'],
                'password' => Hash::make('password'),
                'phone' => $admin['phone'],
                'role' => UserRole::ADMIN->value,
            ]);
        }

        // Create regular users
        $members = [
            [
                'name' => 'Ahmad Hidayat',
                'email' => 'ahmad.hidayat@example.com',
                'phone' => '081234567892',
            ],
            [
                'name' => 'Siti Rahayu',
                'email' => 'siti.rahayu@example.com',
                'phone' => '081234567893',
            ],
            [
                'name' => 'Muhammad Rizki',
                'email' => 'muhammad.rizki@example.com',
                'phone' => '081234567894',
            ],
            [
                'name' => 'Rina Wulandari',
                'email' => 'rina.wulandari@example.com',
                'phone' => '081234567895',
            ],
            [
                'name' => 'Agus Setiawan',
                'email' => 'agus.setiawan@example.com',
                'phone' => '081234567896',
            ],
            [
                'name' => 'Sri Wahyuni',
                'email' => 'sri.wahyuni@example.com',
                'phone' => '081234567897',
            ],
            [
                'name' => 'Bambang Suryanto',
                'email' => 'bambang.suryanto@example.com',
                'phone' => '081234567898',
            ],
            [
                'name' => 'Nia Kurniawati',
                'email' => 'nia.kurniawati@example.com',
                'phone' => '081234567899',
            ],
            [
                'name' => 'Dian Pratama',
                'email' => 'dian.pratama@example.com',
                'phone' => '081234567810',
            ],
            [
                'name' => 'Ratna Sari',
                'email' => 'ratna.sari@example.com',
                'phone' => '081234567811',
            ],
        ];

        foreach ($members as $member) {
            User::create([
                'name' => $member['name'],
                'email' => $member['email'],
                'password' => Hash::make('password'),
                'phone' => $member['phone'],
                'role' => UserRole::MEMBER->value,
            ]);
        }
    }
}
