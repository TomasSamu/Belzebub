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
                    "name" => "Abstract Strategy",
                ],
                [
                    "name" => "Adventure",
                ],
                [
                    "name" => "American West",
                ],
                [
                    "name" => "Ameritrash",  
                ],
                [
                    "name" => "Ancient",  
                ],
                [
                    "name" => "Animals",  
                ],
                [
                    "name" => "Arabian",  
                ],
                [
                    "name" => "Bluffing",  
                ],
                [
                    "name" => "Card Game",  
                ],
                [
                    "name" => "City Building",  
                ],
                [
                    "name" => "Civilization",  
                ],
                [
                    "name" => "Collectible Components",  
                ],
                [
                    "name" => "Deduction",  
                ],
                [
                    "name" => "Dice",  
                ],
                [
                    "name" => "Economic",  
                ],
                [
                    "name" => "Enviromental",  
                ],
                [
                    "name" => "Euro",  
                ],
                [
                    "name" => "Exploration",  
                ],
                [
                    "name" => "Fantasy",  
                ],
                [
                    "name" => "Farming",  
                ],
                [
                    "name" => "Fighting",  
                ],
                [
                    "name" => "Horror",  
                ],
                [
                    "name" => "Industry / Manufacturing",  
                ],
                [
                    "name" => "Mature / Adult",  
                ],
                [
                    "name" => "Medical",  
                ],
                [
                    "name" => "Medieval",  
                ],
                [
                    "name" => "Miniatures",  
                ],
                [
                    "name" => "Modern Warfare",  
                ],
                [
                    "name" => "Movies / TV / Radio",  
                ],
                [
                    "name" => "Mythology",  
                ],
                [
                    "name" => "Nautical",  
                ],
                [
                    "name" => "Negotiation",  
                ],
                [
                    "name" => "Novel-based",  
                ],
                [
                    "name" => "Party Game",  
                ],
                [
                    "name" => "Political",  
                ],
                [
                    "name" => "Puzzle",  
                ],
                [
                    "name" => "Religious",  
                ],
                [
                    "name" => "Renaissance",  
                ],
                [
                    "name" => "Science Fiction",  
                ],
                [
                    "name" => "Space Exploration",  
                ],
                [
                    "name" => "Spies / Secret Agents",  
                ],
                [
                    "name" => "Territory Building",  
                ],
                [
                    "name" => "Transportation",  
                ],
                [
                    "name" => "Travel",  
                ],
                [
                    "name" => "Video Game Theme",  
                ],
                [
                    "name" => "Wargame",  
                ],
                [
                    "name" => "Word Game",  
                ],
            ];

            foreach ($genres as $genre)
            {
                Genre::create($genre);
            }
    }
}
