<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

trait ImageUploadTrait
{
    public function saveSmallerImage($image, $path)
    {
        $manager = new ImageManager(new Driver());
        $img = $manager->read($image);
        $img->resize(150, 150);
        $img->save('storage/' . $path);
    }
    public function deleteImages($images)
    {
        foreach ($images as $img) {
            Storage::delete($img->image);
            Storage::delete(str_replace('images', 'thumbnails', $img->image));
        }
    }
}
