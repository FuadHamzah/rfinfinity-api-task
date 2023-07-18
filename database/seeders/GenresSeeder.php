<?php
/******************************************************************************
php artisan make:seeder StudentSeeder
Seeder ni kegunaan nak declaire siap2 data custom yang kita nak
***************************************************************************** */

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeder=[
            ['Id' => '1', 'Genre' => 'Comedy'],
            ['Id' => '2', 'Genre' => 'Horror'],
            ['Id' => '3', 'Genre' => 'Adventure'],
            ['Id' => '4', 'Genre' => 'Love'],
            ['Id' => '5', 'Genre' => 'Fantasy'],
        ];

        foreach($seeder as $data)
        {
            Genre::create($data);
        }
    }
}
