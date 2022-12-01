<?php

namespace Database\Seeders;

use App\Models\ProductScenario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductScenarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductScenario::create([
            'name' => 'Desain Interior',
        ]);

        ProductScenario::create([
            'name' => 'Landscape',
        ]);

        ProductScenario::create([
            'name' => '3D Animasi',
        ]);

        ProductScenario::create([
            'name' => 'Grafis',
        ]);
    }
}
