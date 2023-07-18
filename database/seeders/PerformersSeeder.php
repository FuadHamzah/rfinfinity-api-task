<?php
/******************************************************************************
php artisan make:seeder StudentSeeder
Seeder ni kegunaan nak declaire siap2 data custom yang kita nak
***************************************************************************** */

namespace Database\Seeders;

use App\Models\Performer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PerformersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeder=[
            ['Id' => '1', 'Name' => 'Al Pacino'],
            ['Id' => '2', 'Name' => 'Gemma Arterton'],
            ['Id' => '3', 'Name' => 'Matthew Goode'],
            ['Id' => '4', 'Name' => 'Ralph Fiennes'],
        ];

        foreach($seeder as $data)
        {
            Performer::create($data);
        }
    }
}
