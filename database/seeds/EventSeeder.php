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
        $events = [
            [
                "user_id" => "1",
                "location_id" => "1",
                "title" => "Monday play",
                "text" => "Regular Monday session",
                "time" => "19:00",
                "date" => "2019-03-11",
                "num_of_players" => "6"
            ],
            [
                "user_id" => "1",
                "location_id" => "2",
                "title" => "Tuesday play",
                "text" => "Regular Tuesday session",
                "time" => "18:00",
                "date" => "2019-03-12",
                "num_of_players" => "7"
            ],
            [
                "user_id" => "2",
                "location_id" => "2",
                "title" => "Wednesday play",
                "text" => "Regular Wednesday session",
                "time" => "20:00",
                "date" => "2019-03-13",
                "num_of_players" => "8"
            ],
        ];

        foreach($events as $event)
        {
            Event::create($event);
        }
    }
}
