<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'user_id' => 1,
                'username' => 'JohnDoe',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
                'role' => 'customer',
            ],
            [
                'user_id' => 2,
                'username' => 'JaneDoe',
                'email' => 'jane@example.com',
                'password' => Hash::make('password'),
                'role' => 'customer',
            ],
        ]);
    }
}