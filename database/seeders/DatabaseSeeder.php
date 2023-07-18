<?php

namespace Database\Seeders;

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
        $this->call(MoviesSeeder::class);
        $this->call(GenresSeeder::class);
        $this->call(performersSeeder::class);
        $this->call(TimeslotsSeeder::class);
        $this->call(MovieGenresSeeder::class);
        $this->call(MoviePerformersSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
}
