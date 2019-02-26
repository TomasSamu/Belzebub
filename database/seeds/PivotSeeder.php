<?php

use Illuminate\Database\Seeder;

class PivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relationships = [
                [
                    "event_id" => "A maze in tchaiovna",
                    "user_id" => "Teahouse at Hradcanska",
                ],

                [
                    "event_id" => "A maze in tchaiovna",
                    "user_id" => "Teahouse at Hradcanska",
                ],
            ];

        foreach($relationships as $relationship)
        {
            Location::create($relationship);
        }
    }
}
