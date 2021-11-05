<?php

use Illuminate\Database\Seeder;
use Intervention\Image\ImageManagerStatic as ImageManager;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = \App\Models\Product::all();
        $publicDir = \Illuminate\Support\Facades\Storage::disk('public');
        if ($publicDir->exists('candy')) {
            $candyImages = $publicDir->files('candy');
            foreach ($products as $product) {
                $name = str_replace(' ', '_', $product->name);

                $foundImages = [];
                foreach ($candyImages as $candyImage) {
                    $tmp = 'candy'.DIRECTORY_SEPARATOR.$name;
                    if (substr_compare($candyImage, $tmp, 0, strlen($tmp)) === 0) {
                        try {
                            $img = ImageManager::make(
                                $publicDir
                                    ->getDriver()
                                    ->getAdapter()
                                    ->applyPathPrefix($candyImage)
                            );

                            if ($img->mime() == 'image/jpeg') {
                                $foundImages[] = $img->filename;
                            }
                        } catch (Exception $e) {}
                    }
                }

                foreach ($foundImages as $foundImage) {
                    $product->images()->updateOrCreate([
                        'path' => $foundImage,
                        'published' => true,
                    ]);
                }
            }
        }
    }
}
