<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

use App\BoardGame;

class CSVGamesSeeder extends Seeder
{
    /**

     *
     * @return void
     */
    public function run()
    {
        $content = File::get(storage_path('our_database - our_database.csv'));

        $content = explode(PHP_EOL, $content);

        foreach($content as $i => $line) {
            
            if($i === 0) continue;

            $line = explode(',', $line);

            BoardGame::create([
                
                "name" => $line[1],
                "min_players" => $line[2],
                "max_players" => $line[3],
                "play_time" => $line[4],
                "year" => $line[5],
                "image_url" => $line[6],
                "age_range" => $line[7],
                "description" => $line[8]
            ]);
        }
    }
}
