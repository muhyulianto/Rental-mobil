<?php

namespace App\Services;

use Storage;

class CarService
{
    /**
     * handleUploadImage
     *
     * @param  mixed $image
     * @return void
     */
    public function handleUploadImage($image, $object)
    {
        if (!is_null($image)) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $object->image = $imageName;
            $object->save();
            Storage::putFileAs("public/images", $image, $imageName);
        }
    }
}
