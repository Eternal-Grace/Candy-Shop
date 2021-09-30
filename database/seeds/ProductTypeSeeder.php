<?php

use App\Models\ProductType;
use Illuminate\Database\Seeder;

/**
 *
 */
class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('product') as $candyTypeName => $candies) {
            ProductType::firstOrCreate(['name' => $candyTypeName]);
        }
    }
}
