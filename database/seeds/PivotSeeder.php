<?php

use Illuminate\Database\Seeder;
use  App\Boardgame;
use App\User;
use App\Genre;

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
            $user->boardgames()->attach([(rand(1,$boardgames->count())),(rand(1,$boardgames->count())),(rand(1,$boardgames->count())),(rand(1,$boardgames->count())),(rand(1,$boardgames->count())),(rand(1,$boardgames->count()))]);
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
    }
}
