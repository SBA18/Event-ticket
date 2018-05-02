<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        User::truncate();

        User::create([
            'uuid' => Str::uuid(),
            'name' => "Sawers",
            'email' => "sawers@saw.com",
            'password' => bcrypt('secret'),
            'role' => "admin",
        ]);
        User::create([
            'uuid' => Str::uuid(),
            'name' => "POS",
            'email' => "pos@pos.com",
            'password' => bcrypt('secret'),
            'role' => "pos",
        ]);
        User::create([
            'uuid' => Str::uuid(),
            'name' => "Alain Dupont",
            'email' => "alain@dupont.com",
            'password' => bcrypt('secret'),
            'role' => "user",
        ]);
    }
}
