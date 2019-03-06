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

        // $genre = Genre::find(1);
        // $boardgames = Boardgame::where('id',49);
        // $genre->boardgames()->attach([$boardgames->id]);
    }
}
