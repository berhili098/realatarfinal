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

        User::create([
            'name' => $faker->name,
            'email' => 'admin@atar.ma',
            'utype' => 'ADM',
            'password' => Hash::make('123456789'),
        ]);
        User::create([
            'name' => $faker->name,
            'email' =>'user@atar.ma',
            'utype' => 'USR',
            'password' => Hash::make('123456789'),
        ]);
    }
}
