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

        $fh = fopen(storage_path('our_database - our_database.csv'), 'r');
        $i = 0;
        while ($line = fgetcsv($fh, 0, ',', '"')) {

            if($i++ === 0) continue;

            $data = [
                
                "name" => $line[0],
                "min_players" => $line[1],
                "max_players" => $line[2],
                "play_time" => $line[3],
                "year" => $line[4],
                "image_url" => $line[5],
                "age_range" => $line[6],
                "description" => $line[7]
            ];

            BoardGame::create($data);
        }

        fclose($fh);
    }
}
