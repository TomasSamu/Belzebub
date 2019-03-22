<?php

use Illuminate\Database\Seeder;
use App\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [];
        for ($i = 1;$i < 51; $i++) {
            Event::create( [
                "user_id" => rand(1,6),
                "location_id" => rand(1,7),
                "title" => "Dummy Event n." . $i,
                "text" => "Regular Boardgame session",
                "time" => "19:00",
                "date" => "2019-04-" . rand(10,28),
                "num_of_players" => rand(1,6)
            ]);
        }
    }
}
