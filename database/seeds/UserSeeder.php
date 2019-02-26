<?php

use Illuminate\Database\Seeder;
use App\User;

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
                "name" => "Anushka Sompedro",
                "username" => 'AnuskaSC',
                "email" => "anuska@gmail.com",
                "year_of_birth" => 1986,
                "gender" => 'undecided',
                "city" => "Prague",
                "country" => "Czechia",
                "password" => "secret"
            ],
            [
                "name" => "Kate Smith",
                "username" => 'Katie',
                "email" => "katie@gmail.com",
                "year_of_birth" => 1997,
                "gender" => 'female',
                "city" => "Prague",
                "country" => "Czechia",
                "password" => "secret"
            ],
            [
                "name" => "John Doe",
                "username" => 'Johnyboi',
                "email" => "JohnD@gmail.com",
                "year_of_birth" => 1993,
                "gender" => 'male',
                "city" => "Prague",
                "country" => "Czechia",
                "password" => "secret"
            ],
            [
                "name" => "Petr Novak",
                "username" => 'PetrNovak',
                "email" => "pNovak@gmail.com",
                "year_of_birth" => 2002,
                "gender" => 'male',
                "city" => "Prague",
                "country" => "Czechia",
                "password" => "secret"
            ],
            [
                "name" => "Milena Dvorakova",
                "username" => 'MD',
                "email" => "MilDvor@gmail.com",
                "year_of_birth" => 1975,
                "gender" => 'female',
                "city" => "Prague",
                "country" => "Czechia",
                "password" => "secret"
            ],
        ];

        foreach($users as $user){
            User::create($user);
    }
}
}