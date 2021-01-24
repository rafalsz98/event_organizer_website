<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'id' => 1,
            'datestart' => '2021-05-04 18:00',
            'duration' => '2:30',
            'name' => 'SAMURAI',
            'description' => 'dobre',
            'place' => 'Night City',
            'latitude' => 10,
            'longitude' => 10,
            'max_participants' => 200,
            'current_participants' => 10,
            'price' => 0,
            'user_id' => 1
        ]);
        DB::table('events')->insert([
            'id' => 2,
            'datestart' => '2021-01-25 20:00',
            'duration' => '2:30',
            'name' => 'Fajno',
            'description' => 't',
            'place' => 'Radom',
            'latitude' => 20,
            'longitude' => 20,
            'max_participants' => 50,
            'current_participants' => 6,
            'price' => 100,
            'user_id' => 2
        ]);
        DB::table('observers')->insert([
            'event_id' => 2,
            'user_id' => 1,
        ]);
    }
}
