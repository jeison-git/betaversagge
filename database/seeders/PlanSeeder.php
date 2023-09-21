<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'slug' => 'cliente versagge',
            'price' => 200, //2.00
            'duration_in_days' => 365,
        ]);

        Plan::create([
            'slug' => 'aliado versagge',
            'price' => 2000, //20.00
            'duration_in_days' => 365,
        ]);
    }
}
