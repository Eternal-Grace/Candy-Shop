<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('product') as $candyTypeName => $candies) {
            Type::firstOrCreate(['name' => $candyTypeName]);
        }
    }
}
