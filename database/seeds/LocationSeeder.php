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
                    "rating" => "9.0",
                    "image" => "https://maps.google.com/maps?q=A%20maze%20in%20tchaiovna&t=&z=13&ie=UTF8&iwloc=&output=embed"
                ],
                [
                    "name" => "Nálet",
                    "description" => "Bar at Holesovice",
                    "street" => "Veletrzni 73",
                    "zip_code" => "17000",
                    "city" => "Praha",
                    "country" => "Czech Republic",
                    "web" => "https://www.facebook.com/naletnaletnalet",
                    "rating" => "9.8",
                    "image" => "https://maps.google.com/maps?q=nalet&t=&z=13&ie=UTF8&iwloc=&output=embed"
                ],
                [
                    "name" => "Paluba",
                    "description" => "Board Games Club",
                    "street" => "Lidická 40b, Anděl, Smíchov-Smíchov",
                    "zip_code" => "15000 ",
                    "city" => "Praha",
                    "country" => "Czech Republic",
                    "web" => "http://www.paluba.cz/",
                    "rating" => "9.7",
                    "image" => "https://maps.google.com/maps?q=Paluba&t=&z=13&ie=UTF8&iwloc=&output=embed"
                ],
                [
                    "name" => "Black Knight",
                    "description" => "Board Games Club",
                    "street" => "Za Poříčskou bránou 21, 8-Florenc",
                    "zip_code" => "18600",
                    "city" => "Praha",
                    "country" => "Czech Republic",
                    "web" => "http://www.cernyrytir.cz/",
                    "rating" => "9.7",
                    "image" => "https://maps.google.com/maps?q=Black%20Knight&t=&z=13&ie=UTF8&iwloc=&output=embed"
                ],               
                [
                    "name" => "Geekárna",
                    "description" => "Café Bar",
                    "street" => "Starokošířská 259/9",
                    "zip_code" => "15500",
                    "city" => "Praha",
                    "country" => "Czech Republic",
                    "web" => "https://www.geekarna.cz",
                    "rating" => "8.5",
                    "image" => "https://maps.google.com/maps?q=Geek%C3%A1rna&t=&z=13&ie=UTF8&iwloc=&output=embed"
                ],
                [
                    "name" => "Boards and Brews",
                    "description" => "Boardgame Pub",
                    "street" => "Charkovská 441/18",
                    "zip_code" => "10100",
                    "city" => "Praha",
                    "country" => "Czech Republic",
                    "web" => "http://www.bohemiaboardsandbrews.com",
                    "rating" => "9.9",
                    "image" => "https://maps.google.com/maps?q=Boards%20and%20Brews&t=&z=13&ie=UTF8&iwloc=&output=embed"
                ],
                [
                    "name" => "Restaurace U Pecků",
                    "description" => "Typical Czech Restaurant",
                    "street" => "Staromlýnská 5",
                    "zip_code" => "19000",
                    "city" => "Praha",
                    "country" => "Czech Republic",
                    "web" => "not available",
                    "rating" => "7.5",
                    "image" => "https://maps.google.com/maps?q=Restaurace%20U%20Peck%C5%AF&t=&z=13&ie=UTF8&iwloc=&output=embed"
                ],
            ];

        foreach($locations as $location)
        {
            Location::create($location);
        }
    }
}
