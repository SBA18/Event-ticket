<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory;
use App\EventType;

class EventTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        EventType::truncate();

        EventType::create([
            'user_id' => 1,
            'name' => "Cinema",
        ]);
        EventType::create([
            'user_id' => 1,
            'name' => "Music",
        ]);
        EventType::create([
            'user_id' => 1,
            'name' => "Theater",
        ]);
    }
}
