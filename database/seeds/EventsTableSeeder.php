<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory;
use App\Event;
use Carbon\Carbon;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Event::truncate();
        $current = Carbon::now();
        foreach(range(1, 20) as $i) {
            Event::create([
                'user_id' => 1,
                'uuid' => Str::uuid(),
                'number' => mt_rand(),
                'name' => $faker->realText(20),
                'event_type_id' => rand(1, 3),
                'salle_id' => rand(1, 5),
                'start_at' => $current->addDays(rand(2, 10)),
                'end_at' => $current->addDays(rand(2, 10))->addHour(2),
                'short_desc' => "Etiam sit amet orci egetAenean ut eros et nislNulla consequat massa quis enim",
                'long_desc' => "Etiam sit amet orci egetAenean ut eros et nislNulla consequat massa quis enimIn consectetuer turpis ut velit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed fringilla mauris sit amet nibh.",
                'price' => rand(150, 500),
            ]);
        }
    }
}
