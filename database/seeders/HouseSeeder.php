<?php

namespace Database\Seeders;

use App\Models\House\House;
use Illuminate\Database\Seeder;

class HouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        House::factory()->count(200)->create();
    }
}
