<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach(range(1,2) as $index)
        {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->randomElement(['admin@atar.ma','user@atar.ma']),
                'utype' => $faker->unique()->randomElement(['USR','ADM']),
                'password' => Hash::make('123456789'),
            ]);
        }
    }
}
