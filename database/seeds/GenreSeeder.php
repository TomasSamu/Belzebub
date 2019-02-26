<?php

use Illuminate\Database\Seeder;
use App\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $genres = [
                [
                    "name" => "Children",
                    "description" => "Children's board games",
                ],
                [
                    "name" => "Fantasy",
                    "description" => "Fantasy board games",   
                ],
                [
                    "name" => "History",
                    "description" => "Historical board games",   
                ],
                [
                    "name" => "Education",
                    "description" => "Educational board games",   
                ]
            ];

            foreach ($genres as $genre)
            {
                Genre::create($genre);
            }
    }
}
