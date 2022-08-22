<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class QuizTableSeeder extends Seeder
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
            Quiz::create([
                'question_ar' => $faker_ar->name,
                'question_fr' => $faker_fr->name,
                'question_en' => $faker_en->name,
                'reponse1_ar' => $faker_ar->text(30),
                'reponse1_fr' => $faker_fr->text(30),
                'reponse1_en' => $faker_en->text(30),
                'reponse2_ar' => $faker_ar->text(30),
                'reponse2_fr' => $faker_fr->text(30),
                'reponse2_en' => $faker_en->text(30),
                'reponse3_ar' => $faker_ar->text(30),
                'reponse3_fr' => $faker_fr->text(30),
                'reponse3_en' => $faker_en->text(30),
                'reponse4_ar' => $faker_ar->text(30),
                'reponse4_fr' => $faker_fr->text(30),
                'reponse4_en' => $faker_en->text(30),
                'correcte_ar' => $faker_ar->numberBetween(1,4),
                'correcte_fr' => $faker_fr->numberBetween(1,4),
                'correcte_en' => $faker_en->numberBetween(1,4),
                'user_id' => 1,
                'site_id'=> $faker_fr->numberBetween(1,10),
                
                
            ]);
        }
        
    }
}
