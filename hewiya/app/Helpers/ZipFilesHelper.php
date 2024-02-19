<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Storage;

class ZipFilesHelper
{
    public static function zipFIles($files , $zip_file){
        // Initializing PHP class
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        // Adding file: second parameter is what will the path inside of the archive
        // So it will create another folder called "storage/" inside ZIP, and put the file there.
        $zip->addFile(storage_path('app/images/'.$files[0]), 'id.png');
        $zip->addFile(storage_path('app/images/'.$files[1]), 'capture.png');
        $zip->close();
        // We return the zip file
        $zip_file;
        Storage::put('zips/'.$zip_file, $zip_file);
    }
}
