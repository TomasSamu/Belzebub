<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GameSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(CSVGamesSeeder::class);
        $this->call(PivotSeeder::class);
    }
}
