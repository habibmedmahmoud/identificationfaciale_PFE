<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ZipFilesHelper;
use App\Jobs\ProcessVerificationJob;
use Illuminate\Support\Facades\Storage;

class ZipFileController extends Controller
{
    public function downloadZipFIles(){
        //zip files 
        $zip_file = ZipFilesHelper::zipFiles(['test.png','1645805136alSNEXV1qNoQiKUMFbwjc4fTTrwq9AbB.png'],'verification.zip'); // Name of our archive to download
        //send data to app data 
        //$contents=Storage::readStream('zips/verification.zip');
        //$zip_file=stream_get_contents($contents);
        $res = ProcessVerificationJob::dispatchNow($zip_file , 'token');
        $res = json_decode($res);
        return $res->status;
    }
}
