<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Schools\Models\School;
class StudentSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        School::factory(20)->create();
    }
}
