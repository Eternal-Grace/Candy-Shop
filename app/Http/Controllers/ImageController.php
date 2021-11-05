<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as ImageManager;

/**
 *
 */
class ImageController extends Controller
{
    public function show(Image $image, string $size = null): string
    {
        $publicDir = Storage::disk('public');
        $imagePath = 'candy'.DIRECTORY_SEPARATOR.$image->path.'.jpg';

        if (!!$image->path && $publicDir->exists($imagePath)) {
            $img = ImageManager::make(
                $publicDir
                    ->getDriver()
                    ->getAdapter()
                    ->applyPathPrefix($imagePath)
            );
            if ($size != 'full') {
                $img->fit(380, 260);
            }
            header('Content-Type: image/jpg');
            return $img->encode('jpg', 70);
        }
        abort(404);
    }

    /*
     * #TODO: Backend Interface? or Not? To ADD images + products
     * TOO TIME CONSUMING ~ DROP THE IDEA - FINISH OTHER PROJECTS
    public function add(): string
    {
        //
    }
    */
}
