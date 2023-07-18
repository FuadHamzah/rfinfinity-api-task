<?php
/******************************************************************************
php artisan make:seeder StudentSeeder
Seeder ni kegunaan nak declaire siap2 data custom yang kita nak
***************************************************************************** */

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeder=[
            ['Id' => '1', 'Title' => 'The Irishman' , 'Description' => 'An aging hitman recalls his time with the mob and the intersecting events with his friend, Jimmy Hoffa, through the 1950-70s.', 'release' => '2022-11-21' , 'length' => '95' , 'director' => 'Alfred Hitchcock' , 'mpaa_rating' => 'PG-13' , 'language' => 'English' ],
            ['Id' => '2', 'Title' => 'Parasite' , 'Description' => 'A poor family, the Kims, con their way into becoming the servants of a rich family, the Parks. But their easy life gets complicated when their deception is threatened with exposure.', 'release' => '2022-02-19' , 'length' => '82' , 'director' => 'Akira Kurosawa' , 'mpaa_rating' => 'PG-13' , 'language' => 'English' ],
            ['Id' => '3', 'Title' => 'The Favourite' , 'Description' => 'In early 18th century England, a frail Queen Anne occupies the throne and her close friend, Lady Sarah, governs the country in her stead. When a new servant, Abigail, arrives, her charm endears her to Sarah.', 'release' => '2022-12-23' , 'length' => '90' , 'director' => 'Akira Kurosawa' , 'mpaa_rating' => 'PG-13' , 'language' => 'English' ],
            ['Id' => '4', 'Title' => 'The Farewell I' , 'Description' => 'A Chinese family discovers their grandmother has only a short while left to live and decide to keep her in the dark, scheduling a wedding to gather before she dies.', 'release' => '2022-03-18' , 'length' => '100' , 'director' => 'Steven Spielberg' , 'mpaa_rating' => 'PG-13' , 'language' => 'English' ],
            ['Id' => '5', 'Title' => 'Shoplifters' , 'Description' => 'A family of small-time crooks take in a child they find outside in the cold.', 'release' => '2022-05-03' , 'length' => '121' , 'director' => 'Stanley Kubrick' , 'mpaa_rating' => 'PG-13' , 'language' => 'English' ],
        ];

        foreach($seeder as $data)
        {
            Movie::create($data);
        }
    }
}
