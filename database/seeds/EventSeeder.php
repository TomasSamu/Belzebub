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
                "title" => "monday play",
                "text" => "Regular monday session",
                "time" => "19:00",
                "date" => "2019-03-11",
                "num_of_players" => "6"
            ],
            [
                "user_id" => "1",
                "location_id" => "2",
                "title" => "tuesday play",
                "text" => "Regular tuesday session",
                "time" => "18:00",
                "date" => "2019-03-12",
                "num_of_players" => "7"
            ],
            [
                "user_id" => "2",
                "location_id" => "2",
                "title" => "wednesday play",
                "text" => "Regular wednesday session",
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
