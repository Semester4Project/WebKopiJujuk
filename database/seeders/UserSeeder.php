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
        $userData = [
            [
                'name'=> 'tutik',
                'email'=> 'tutik@gmail.com',
                'password'=> bcrypt('4567'),
                'role'=> 'admin'
            ],
            [
                'name'=> 'rinin',
                'email'=> 'rinin@gmail.com',
                'password'=> bcrypt('12345'),
                'role'=> 'admin'
            ],
            [
                'name'=> 'riska',
                'email'=> 'riska@gmail.com',
                'password'=> bcrypt('8889'),
                'role'=> 'customer'
            ],
            [
                'name'=> 'nopa',
                'email'=> 'nopa@gmail.com',
                'password'=> bcrypt('0987'),
                'role'=> 'customer'
            ],
            [
                'name'=> 'rudi',
                'email'=> 'nika@gmail.com',
                'password'=> bcrypt('123456'),
                'role'=>'admin'
            ],
            [
                'name'=> 'kukus',
                'email'=> 'kukus@gmail.com',
                'password'=> bcrypt('23456'),
                'role'=>'customer'
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}