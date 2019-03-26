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
                    "name" => "A Maze in Tchaiovna",
                    "description" => "Teahouse at Hradcanska",
                    "street" => "Muchova 4",
                    "zip_code" => "16000",
                    "city" => "Praha",
                    "country" => "Czech Republic",
                    "web" => "http://www.tchaiovna.cz",
                    "rating" => "9.0",
                    "map" => "https://maps.google.com/maps?q=A%20maze%20in%20tchaiovna&t=&z=13&ie=UTF8&iwloc=&output=embed",
                    "image" => "https://czechbyjane.com/wp-content/uploads/2018/06/DSC07067-2-e1528322974740.jpg",
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
                    "map" => "https://maps.google.com/maps?q=nalet&t=&z=13&ie=UTF8&iwloc=&output=embed",
                    "image" => "https://goout.net/i/075/759065-250.jpg",
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
                    "image" => "https://maps.google.com/maps?q=Paluba&t=&z=13&ie=UTF8&iwloc=&output=embed",
                    "image" => "http://www.paluba.cz/resources/img/logo.svg",
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
                    "map" => "https://maps.google.com/maps?q=Black%20Knight&t=&z=13&ie=UTF8&iwloc=&output=embed",
                    "image" => "https://scontent-frx5-1.xx.fbcdn.net/v/t1.0-9/23167919_1709749092432677_6993913787547563664_n.png?_nc_cat=101&_nc_ht=scontent-frx5-1.xx&oh=60acdedac2dc0912b751ba7b68f881db&oe=5D46C2DC",
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
                    "map" => "https://maps.google.com/maps?q=Geek%C3%A1rna&t=&z=13&ie=UTF8&iwloc=&output=embed",
                    "image" => "https://www.geekarna.cz/images/grid/12.jpg",
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
                    "map" => "https://maps.google.com/maps?q=Boards%20and%20Brews&t=&z=13&ie=UTF8&iwloc=&output=embed",
                    "image" => "http://hrajeme.cz/wp-content/uploads/Bohemia-Boards-03-nahled.jpg",
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
                    "map" => "https://maps.google.com/maps?q=Restaurace%20U%20Peck%C5%AF&t=&z=13&ie=UTF8&iwloc=&output=embed",
                    "image" => "https://www.menicka.cz/foto/thumb4/2584-4-obr7.jpg",
                ],
            ];

        foreach($locations as $location)
        {
            Location::create($location);
        }
    }
}
