<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        Permission::create([
            'name' => 'sites',

        ]);
        Permission::create([
            'name' => 'cities',

        ]);
        Permission::create([
            'name' => 'quizzes',

        ]);
        Permission::create([
            'name' => 'users',

        ]);
        Permission::create([
            'name' => 'paths',

        ]);
    }
}
