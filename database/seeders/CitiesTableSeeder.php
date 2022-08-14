<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker_ar = Faker::create('ar_SA');
        $faker_fr = Faker::create('fr_FR');
        $faker_en = Faker::create('en_EN');
        foreach(range(1,20) as $index)
        {
            City::create([
                'city_ar' => $faker_ar->name,
                'city_fr' => $faker_fr->name,
                'city_en' => $faker_en->name,
                'description_ar' => $faker_ar->text(500),
                'description_fr' => $faker_fr->paragraph(3),
                'description_en' => $faker_en->paragraph(3),
                'user_id' => 1,
            ]);
        }
        
    }
}
