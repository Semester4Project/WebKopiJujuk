<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTest extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'username' => 'user1',
            'email' => 'user1@example.com',
            'password' => bcrypt('password'),
            'role' => 'customer',
        ]);
    }
}
