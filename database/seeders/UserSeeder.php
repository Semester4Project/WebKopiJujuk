<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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

// namespace Database\Seeders;

// use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;

// class UserSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {
//         $userData = [
//             [
//                 'username'=> 'tutik',
//                 'email'=> 'tutik@gmail.com',
//                 'password'=> bcrypt('4567'),
//                 'role'=> 'admin'
//             ],
//             [
//                 'username'=> 'rinin',
//                 'email'=> 'rinin@gmail.com',
//                 'password'=> bcrypt('12345'),
//                 'role'=> 'admin'
//             ],
//             [
//                 'username'=> 'riska',
//                 'email'=> 'riska@gmail.com',
//                 'password'=> bcrypt('8889'),
//                 'role'=> 'customer'
//             ],
//             [
//                 'username'=> 'nopa',
//                 'email'=> 'nopa@gmail.com',
//                 'password'=> bcrypt('0987'),
//                 'role'=> 'customer'
//             ],
//             [
//                 'username'=> 'rudi',
//                 'email'=> 'nika@gmail.com',
//                 'password'=> bcrypt('123456'),
//                 'role'=>'admin'
//             ],
//             [
//                 'username'=> 'kukus',
//                 'email'=> 'kukus@gmail.com',
//                 'password'=> bcrypt('23456'),
//                 'role'=>'customer'
//             ],

//             [
//                 'username'=> 'adi',
//                 'email'=> 'adi@gmail.com',
//                 'password'=> bcrypt('12345'),
//                 'role'=>'admin'
//             ],
//         ];

//         foreach($userData as $key => $val){
//             User::create($val);
//         }
//     }
// }