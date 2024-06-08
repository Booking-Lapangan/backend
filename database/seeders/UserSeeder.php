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
            'name' => 'dika',
            'phone' => '088222287234',
            'email' => 'dikasaputra190903"gmail.com',
            'password' => bcrypt('FoxxySTR1909'),
            'otp' => '123455',
            'access' => 'yes',
            'role' => 'user'

        ]);
    }
}
