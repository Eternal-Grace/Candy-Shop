<?php

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/**
 *
 */
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (config('product') as $candyTypeName => $candies) {
            $productType = ProductType::where('name', '=', $candyTypeName)->first();
            if (!empty($productType)) {
                foreach ($candies as $candy) {
                    $productDoesNotExists = Product::where('name', '=', $candy)
                        ->whereHas('productTypes', function ($query) use ($candyTypeName) {
                            $query->where('name', '=', $candyTypeName);
                        })
                        ->doesntExist();
                    if ($productDoesNotExists) {
                        $product = Product::firstOrCreate(['name' => $candy], [
                            'slug' => Str::slug($candy),
                            'price' => $faker->randomFloat(2, 5.99, 16.99)
                        ]);
                        $product->productTypes()->associate($productType);
                        $product->push();
                    }
                }
            }
        }
    }
}
