<?php

namespace Database\Seeders;

use Domain\Category\Models\Category;
use Domain\Product\Models\Product;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->has(
            Product::factory()->count(5)
        )->count(4)->create();
    }
}