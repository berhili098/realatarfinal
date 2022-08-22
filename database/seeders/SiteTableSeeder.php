<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
class SiteTableSeeder extends Seeder
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
            Site::create([
                'name_ar' => $faker_ar->name,
                'name_fr' => $faker_fr->name,
                'name_en' => $faker_en->name,
                'description_ar' => $faker_ar->text(500),
                'description_fr' => $faker_fr->paragraph(3),
                'description_en' => $faker_en->paragraph(3),
                'user_id' => 1,
                'openTime' => $faker_fr->time('H:i:s'),
                'duration'=> $faker_fr->numberBetween(1,10),
                'price'=> $faker_fr->numberBetween(1,10),
                'longitude'=> $faker_fr->longitude,
                'latitude'=> $faker_fr->latitude,
                'city_id'=> $faker_fr->numberBetween(1,10),
            ]);
        }
    }
}
