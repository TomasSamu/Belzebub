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
        for ($i;$i === 50; $i++) {
            $events +=  [
                "user_id" => rand(1,6),
                "location_id" => rand(1,7),
                "title" => "Dummy Event n." . $i,
                "text" => "Regular Boardgame session",
                "time" => "19:00",
                "date" => "2019-" . rand(0,28) . "-" . rand(1,12),
                "num_of_players" => rand(1,6)
            ];
        }
        foreach($events as $event)
        {
            Event::create($event);
        }
    }
}
