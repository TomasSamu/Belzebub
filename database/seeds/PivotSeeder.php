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
        $boardgames = App\Boardgame::all();
        $users = App\User::all();
        foreach ($users as $user) {
            $user->boardgames()->attach([(rand(1,$boardgames->count())),(rand(1,$boardgames->count())),(rand(1,$boardgames->count())),(rand(1,$boardgames->count())),(rand(1,$boardgames->count())),(rand(1,$boardgames->count()))]);
        }

    }
}
