<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('admin'),
                'role_id' => 1,
                'image' => 'default.png',
            ],
            [
                'name' => 'guest',
                'email' => 'guest@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('guest'),
                'role_id' => 2,
                'image' => 'default.png',
            ]
        ]);
    }
}
