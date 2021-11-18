<?php

namespace App\Traits;

trait ImageUpload
{
    public function uploadImage($imag, $name)
    {

        $file = $imag;
        $imagename = $file->getClientOriginalName();

        
        $path = env('APP_URL') . $name . "/";
        $dbname = $path . time() . $imagename;

        $fileNameToStore = time() . $imagename;
        $destinationPath = public_path($name);
        $file->move($destinationPath, $fileNameToStore);

        return $dbname;
    }
}
