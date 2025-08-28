<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'user_type' => 'admin',
            'icon' => 'icon',
            'phone_no' => '+923758365729',
            'status' => 'approved',
            'whatsapp_no' => '+923758365729',
            'address' => 'Gujranwala',
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
            'user_type' => 'user',
            'icon' => 'icon',
            'phone_no' => '+923758365729',
            'status' => 'approved',
            'whatsapp_no' => '+923758365729',
            'address' => 'Gujranwala',
        ]);
    }
}