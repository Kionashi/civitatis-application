<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Activity;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activity::factory()->count(5)->create();   
    }
}
