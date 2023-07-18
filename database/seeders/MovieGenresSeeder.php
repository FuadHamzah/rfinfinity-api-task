<?php
/******************************************************************************
php artisan make:seeder StudentSeeder
Seeder ni kegunaan nak declaire siap2 data custom yang kita nak
***************************************************************************** */

namespace Database\Seeders;

use App\Models\MovieGenre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieGenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeder=[
            ['Movie_ID' => '2', 'Genre_ID' => '1'],
            ['Movie_ID' => '3', 'Genre_ID' => '1'],
            ['Movie_ID' => '4', 'Genre_ID' => '1'],
        ];

        foreach($seeder as $data)
        {
            MovieGenre::create($data);
        }
    }
}
