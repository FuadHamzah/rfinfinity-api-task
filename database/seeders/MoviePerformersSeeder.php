<?php
/******************************************************************************
php artisan make:seeder StudentSeeder
Seeder ni kegunaan nak declaire siap2 data custom yang kita nak
***************************************************************************** */

namespace Database\Seeders;

use App\Models\MoviePerformer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoviePerformersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeder=[
            ['Movie_ID' => '1', 'Performer_ID' => '1', 'Overall_rating' => '7.9'],
        ];

        foreach($seeder as $data)
        {
            MoviePerformer::create($data);
        }
    }
}
