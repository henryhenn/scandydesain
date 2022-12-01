<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::create([
           'name' => 'Minimalis'
        ]);

        ProductCategory::create([
            'name' => 'Sederhana'
        ]);

        ProductCategory::create([
            'name' => 'Modern'
        ]);

        ProductCategory::create([
            'name' => 'Terbaik'
        ]);
    }
}
