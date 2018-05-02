<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory;
use App\Salle;

class SallesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Salle::truncate();
        foreach(range(1, 5) as $i) {
            Salle::create([
                'user_id' => 1,
                'uuid' => Str::uuid(),
                'name' => "Salle" . " ". rand(100, 1010),
                'location' => $faker->secondaryAddress,
                'seats' => 200,
                'status' => "Available",
            ]);
        }
    }
}
