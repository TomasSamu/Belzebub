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
                    "rating" => "9.0"

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
                
                [
                    "name" => "Geekárna",
                    "description" => "Café Bar",
                    "street" => "Starokošířská 259/9",
                    "zip_code" => "15500",
                    "city" => "Praha",
                    "country" => "Czech Republic",
                    "web" => "https://www.geekarna.cz",
                    "rating" => "8.5"
                ],
                [
                    "name" => "Boards and Brews",
                    "description" => "Boardgame Pub",
                    "street" => "Charkovská 441/18",
                    "zip_code" => "10100",
                    "city" => "Praha",
                    "country" => "Czech Republic",
                    "web" => "www.",
                    "rating" => "9.9"
                ],
                [
                    "name" => "Restaurace U Pecků",
                    "description" => "Typical Czech Restaurant",
                    "street" => "Staromlýnská 5",
                    "zip_code" => "19000",
                    "city" => "Praha",
                    "country" => "Czech Republic",
                    "web" => "not available",
                    "rating" => "7.5"
                ],
            ];

        foreach($locations as $location)
        {
            Location::create($location);
        }
    }
}
