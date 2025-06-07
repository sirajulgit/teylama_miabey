
<?php

use App\Models\CmsBadge;
use App\Models\CmsHomePage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\Encoders\WebpEncoder;
use Intervention\Image\Encoders\GifEncoder;
use Illuminate\Support\Str;


function image_resize($image_name, $width, $height)
{

    try {

        $originalImagePath = public_path('uploads/images/' . $image_name);
        $destinationPath = public_path('uploads/images/resize/' . $image_name);

        if (file_exists($originalImagePath)) {

            // create new manager instance with desired driver
            $manager = new ImageManager(new Driver());

            $image = $manager->read($originalImagePath);
            $image->resize($width, $height);
            $image->save($destinationPath);
        }
    } catch (Exception $ex) {
        dd($ex);
    }
}


function image_convert_webp($image_file, $quality = 30)
{

    try {

        $imageName = Str::random() . '-' . time() . '.webp';

        $originalImagePath = public_path('uploads/images/' . $imageName);

        // create new manager instance with desired driver
        $manager = new ImageManager(new Driver());


        $image = $manager->read($image_file);

        // encode jpeg as webp format
        $encoded = $image->encode(new WebpEncoder(quality: $quality));

        $encoded->save($originalImagePath);

        return $imageName;
    } catch (Exception $ex) {
        dd($ex);
    }
}



