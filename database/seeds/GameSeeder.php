<?php

use Illuminate\Database\Seeder;
//use App\BoardGame;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $games = [
            [
                "name" => "Rising Sun",
                "play_time" => 180,
                "age_range" => 15,
                "min_players" => 3,
                "max_players" => 5,
                "image" => "placeholder"
            ],
            [
                "name" => "Dominion",
                "play_time" => 60,
                "age_range" => 9,
                "min_players" => 2,
                "max_players" => 4,
                "image" => "placeholder"
            ],
            [
                "name" => "Betrayal Legacy",
                "play_time" => 90,
                "age_range" => 12,
                "min_players" => 3,
                "max_players" => 5,
                "image" => "placeholder"
            ],
            [
                "name" => "Fury of Dracula",
                "play_time" => 120,
                "age_range" => 12,
                "min_players" => 2,
                "max_players" => 5,
                "image" => "placeholder"
            ],
            [
                "name" => "Star Realms",
                "play_time" => 30,
                "age_range" => 7,
                "min_players" => 2,
                "max_players" => 2,
                "image" => "placeholder"
            ],
            [
                "name" => "Deception: Murder in Hong Kong",
                "play_time" => 20,
                "age_range" => 10,
                "min_players" => 4,
                "max_players" => 12,
                "image" => "placeholder"
            ],
        ];

        foreach($games as $game){
            BoardGame::create($game);
        }
    }
}
