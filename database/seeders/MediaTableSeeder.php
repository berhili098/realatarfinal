<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;

class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        foreach(range(1,20) as $index)
        {
            Media::create([
                'site_id' => $index,
                'name' => '1661347916fUuZ5awFna.mp4',
                'type' => 'video',
                'lang'=>'en'
            ]);
        }
    }
}
