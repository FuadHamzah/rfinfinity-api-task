<?php
/******************************************************************************
php artisan make:seeder StudentSeeder
Seeder ni kegunaan nak declaire siap2 data custom yang kita nak
***************************************************************************** */

namespace Database\Seeders;

use App\Models\Timeslot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimeslotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeder=[
            ['Id' => '1', 'Theater_name' => 'abc movies' , 'Start_time' => '2020-04-04 00:00:00' , 'End_time' => '2020-04-05 00:00:00' , 'Theater_room_no' => '1' , 'Movie_ID' => '1'],
            ['Id' => '2', 'Theater_name' => 'abc movies' , 'Start_time' => '2020-04-04 10:00:00' , 'End_time' => '2020-04-04 13:00:00' , 'Theater_room_no' => '2' , 'Movie_ID' => '2'],
            ['Id' => '3', 'Theater_name' => 'abc movies' , 'Start_time' => '2020-04-04 11:00:00' , 'End_time' => '2020-04-04 14:00:00' , 'Theater_room_no' => '3' , 'Movie_ID' => '3'],
            ['Id' => '4', 'Theater_name' => 'abc movies' , 'Start_time' => '2020-04-04 12:00:00' , 'End_time' => '2020-04-04 15:00:00' , 'Theater_room_no' => '4' , 'Movie_ID' => '4'],
            ['Id' => '5', 'Theater_name' => 'abc movies' , 'Start_time' => '2020-04-04 13:00:00' , 'End_time' => '2020-04-04 16:00:00' , 'Theater_room_no' => '5' , 'Movie_ID' => '5'],
        ];

        foreach($seeder as $data)
        {
            Timeslot::create($data);
        }
    }
}
