<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

use App\BoardGame;

class CSVGamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = File::get(storage_path('boardgame.csv'));

        $content = explode(PHP_EOL, $content);

        foreach($content as $i => $line) {
            
            if($i === 0) continue;

            $line = explode(',', $line);

            BoardGame::create([
                "name" => $line[1],
                "play_time" => $line[4],
                "age_range" => $line[6],
                "min_players" => $line[2],
                "max_players" => $line[3],
                "image" => $line[5]
            ]);
        }
    }
}
