<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'name' => 'admin',
            'phone' => '1112223334445',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'otp' => '123456',
            'access' => 'yes',
            'role' => 'admin'
           ]);
    }
}
