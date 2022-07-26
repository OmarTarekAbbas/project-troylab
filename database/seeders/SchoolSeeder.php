<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
class SchoolSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Schools\Models\School::factory(100)->create();
    }
}
