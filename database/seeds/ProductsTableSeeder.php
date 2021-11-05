<?php

use App\Models\Product;
use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
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
            $productType = Type::where('name', '=', $candyTypeName)->first();
            if (!empty($productType)) {
                foreach ($candies as $candy) {
                    $productDoesNotExists = Product::where('name', '=', $candy)
                        ->whereHas('productType', function ($query) use ($candyTypeName) {
                            $query->where('name', '=', $candyTypeName);
                        })
                        ->doesntExist();
                    if ($productDoesNotExists) {
                        $product = Product::firstOrCreate(['name' => $candy], [
                            'slug' => Str::slug($candy),
                            'stock' => $faker->numberBetween(0, 100),
                            'published' => true,
                            'price' => $faker->randomFloat(2, 5.99, 16.99)
                        ]);
                        $product->productType()->associate($productType);
                        $product->push();
                    }
                }
            }
        }
    }
}
