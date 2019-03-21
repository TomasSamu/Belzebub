<?php

use Illuminate\Database\Seeder;
use App\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
                [
                    "name" => "A maze in tchaiovna",
                    "description" => "Teahouse at Hradcanska",
                    "street" => "Muchova 4",
                    "zip_code" => "16000",
                    "city" => "Praha",
                    "country" => "Czech Republic",
                    "web" => "http://www.tchaiovna.cz",
                    "rating" => "9.8"

                ],

                [
                    "name" => "Nálet",
                    "description" => "Bar at Holesovice",
                    "street" => "Veletrzni 73",
                    "zip_code" => "17000",
                    "city" => "Praha",
                    "country" => "Czech Republic",
                    "web" => "https://www.facebook.com/naletnaletnalet",
                    "rating" => "9.8"
                ],

                [
                    "name" => "Paluba",
                    "description" => "Board Games Club",
                    "street" => "Lidická 40b, Anděl, Smíchov-Smíchov",
                    "zip_code" => "15000 ",
                    "city" => "Praha",
                    "country" => "Czech Republic",
                    "web" => "http://www.paluba.cz/",
                    "rating" => "9.7"
                ],

                [
                    "name" => "Black Knight",
                    "description" => "Board Games Club",
                    "street" => "Za Poříčskou bránou 21, 8-Florenc",
                    "zip_code" => "18600",
                    "city" => "Praha",
                    "country" => "Czech Republic",
                    "web" => "http://www.cernyrytir.cz/",
                    "rating" => "9.7"
                ],

                
            ];

        foreach($locations as $location)
        {
            Location::create($location);
        }
    }
}
