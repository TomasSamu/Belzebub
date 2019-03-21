<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "name" => "Anuska Sampedro",
                "username" => 'Anuska',
                "email" => "anuska@gmail.com",
                "year_of_birth" => 1988,
                "gender" => 'Unclear',
                "city" => "Prague",
                "country" => "Czechia",
                "password" => Hash::make("secret"),
                "image" => "https://data.whicdn.com/images/55415997/original.gif"
            ],
            [
                "name" => "Kate Smith",
                "username" => 'Katie',
                "email" => "katie@gmail.com",
                "year_of_birth" => 1997,
                "gender" => 'female',
                "city" => "Prague",
                "country" => "Czechia",
                "password" => Hash::make("secret"),
                "image" => "https://randomuser.me/api/portraits/women/6.jpg",
                "is_admin" => 1
            ],
            [
                "name" => "John Doe",
                "username" => 'Johnyboi',
                "email" => "JohnD@gmail.com",
                "year_of_birth" => 1993,
                "gender" => 'male',
                "city" => "Prague",
                "country" => "Czechia",
                "password" => Hash::make("secret"),
                "image" => "https://randomuser.me/api/portraits/men/5.jpg"
            ],
            [
                "name" => "Petr Novak",
                "username" => 'PetrNovak',
                "email" => "pNovak@gmail.com",
                "year_of_birth" => 2002,
                "gender" => 'male',
                "city" => "Prague",
                "country" => "Czechia",
                "password" => Hash::make("secret"),
                "image" => "https://randomuser.me/api/portraits/men/57.jpg"
            ],
            [
                "name" => "Milena Dvorakova",
                "username" => 'MD',
                "email" => "MilDvor@gmail.com",
                "year_of_birth" => 1975,
                "gender" => 'female',
                "city" => "Prague",
                "country" => "Czechia",
                "password" => Hash::make("secret"),
                "image" => "https://randomuser.me/api/portraits/women/31.jpg"
            ],
            [
                "name" => "Bond",
                "username" => 'JamesBond007',
                "email" => "JB@gmail.com",
                "year_of_birth" => 2018,
                "gender" => 'undecided',
                "city" => "Prague",
                "country" => "Czechia",
                "password" => Hash::make("secret"),
                "image" => "https://randomuser.me/api/portraits/men/34.jpg",
                "is_admin" => 1
            ]
        ];

        foreach($users as $user){

            User::create($user);

        
    }
}
}
