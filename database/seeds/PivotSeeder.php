<?php

use Illuminate\Database\Seeder;
use  App\Boardgame;
use App\User;
use App\Genre;
use App\Rating;

class PivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $boardgames = Boardgame::all();
        $users = User::all();
        foreach ($users as $user) {
            $user->boardgames()->sync([(rand(1,$boardgames->count())),(rand(1,$boardgames->count())),(rand(1,$boardgames->count())),(rand(1,$boardgames->count())),(rand(1,$boardgames->count())),(rand(1,$boardgames->count()))]);
        }
        $genre = Genre::all();
        $users = User::all();
        foreach ($users as $user) {
            $user->genres()->sync([(rand(1,$genre->count())),(rand(1,$genre->count())),(rand(1,$genre->count())),(rand(1,$genre->count())),(rand(1,$genre->count())),(rand(1,$genre->count()))]);
        }

        $genre = Genre::find(1);
        $boardgames = Boardgame::whereIn('id',[49])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(2);
        $boardgames = Boardgame::whereIn('id',[1,12,16,18,19,23,30,35,37,41,43])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(3);
        $boardgames = Boardgame::whereIn('id',[10])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(5);
        $boardgames = Boardgame::whereIn('id',[9,24,32,40])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(6);
        $boardgames = Boardgame::whereIn('id',[13,15])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(7);
        $boardgames = Boardgame::whereIn('id',[47])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(8);
        $boardgames = Boardgame::whereIn('id',[34])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(9);
        $boardgames = Boardgame::whereIn('id',[3,9,18,34,37,38,40,45])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(10);
        $boardgames = Boardgame::whereIn('id',[9,14,33,39,40,42,46])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(11);
        $boardgames = Boardgame::whereIn('id',[3,7,8,9,20,27,32,40,44,45])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(12);
        $boardgames = Boardgame::whereIn('id',[18,34])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(13);
        $boardgames = Boardgame::whereIn('id',[38])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(14);
        $boardgames = Boardgame::whereIn('id',[4,6,11,12,16,19,21,23,27,29,30,35,36,41,43,44])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(15);
        $boardgames = Boardgame::whereIn('id',[3,5,7,8,13,14,15,20,22,24,26,28,29,31,32,33,36,39,42,45])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(16);
        $boardgames = Boardgame::whereIn('id',[2,5])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(18);
        $boardgames = Boardgame::whereIn('id',[1,16,19,27,30,37,44,45])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(19);
        $boardgames = Boardgame::whereIn('id',[1,7,12,13,16,17,18,19,21,35,43,46,47])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(20);
        $boardgames = Boardgame::whereIn('id',[13,14,15,22,32])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(21);
        $boardgames = Boardgame::whereIn('id',[1,6,8,12,16,17,19,21,23,27,30,43])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(22);
        $boardgames = Boardgame::whereIn('id',[18,19,35,37,43])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(23);
        $boardgames = Boardgame::whereIn('id',[5,26,28,29,31,33])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(24);
        $boardgames = Boardgame::whereIn('id',[35,41])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(25);
        $boardgames = Boardgame::whereIn('id',[2])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(26);
        $boardgames = Boardgame::whereIn('id',[2])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(27);
        $boardgames = Boardgame::whereIn('id',[1,6,8,12,17,19,21,23,35])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(28);
        $boardgames = Boardgame::whereIn('id',[4])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(28);
        $boardgames = Boardgame::whereIn('id',[4])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(29);
        $boardgames = Boardgame::whereIn('id',[6,23])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(30);
        $boardgames = Boardgame::whereIn('id',[17,32,35,47])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(31);
        $boardgames = Boardgame::whereIn('id',[24,33,39])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(32);
        $boardgames = Boardgame::whereIn('id',[44])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(33);
        $boardgames = Boardgame::whereIn('id',[12,18,30,43])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(34);
        $boardgames = Boardgame::whereIn('id',[38])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(35);
        $boardgames = Boardgame::whereIn('id',[4,44])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(36);
        $boardgames = Boardgame::whereIn('id',[19,29,49])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(37);
        $boardgames = Boardgame::whereIn('id',[25])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(38);
        $boardgames = Boardgame::whereIn('id',[25])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(39);
        $boardgames = Boardgame::whereIn('id',[5,6,8,23,27,34,37,41,44,45])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(40);
        $boardgames = Boardgame::whereIn('id',[27,44,45])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(41);
        $boardgames = Boardgame::whereIn('id',[38])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(42);
        $boardgames = Boardgame::whereIn('id',[5,7,8,11,12,39])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(43);
        $boardgames = Boardgame::whereIn('id',[31])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(44);
        $boardgames = Boardgame::whereIn('id',[25,36])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(45);
        $boardgames = Boardgame::whereIn('id',[21])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(46);
        $boardgames = Boardgame::whereIn('id',[4,6,12,23,27,44])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }
        $genre = Genre::find(47);
        $boardgames = Boardgame::whereIn('id',[38])->get();
        foreach ($boardgames as $boardgame) {
        $genre->boardgames()->attach([$boardgame->id]);
        }

        $users = User::all();
        $locations = Location::all();
        foreach ($locations as $location) {
            foreach ($users as $user) {
                $rating = new Rating;
                $rating->location_id = $location->id;
                $rating->rating = rand(3,5);
                $rating->user_id = $user->id;
                $rating->save();
            }
        }
    }
}
