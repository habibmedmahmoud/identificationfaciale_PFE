<?php

namespace App\Http\Controllers;
use App\Models\Identification; 
use Illuminate\Support\Facades\Storage;
use App\Helpers\ZipFilesHelper;

use Illuminate\Http\Request;

class ProcessingController extends Controller
{
    public function taekScreenshotImage(Request $request){
        $token = $request->userToken ;
        $identification = Identification::where('token',$token)->get()->first();
        if ($identification && $identification->status == 'email verifie') {
            $identification->file2Name = $token.'.png';
            $identification->status = 'processing';
            
            // decode the base64 file 
            $file = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '',$request->bineryImage)); 
            Storage::put('images/'.$token.'.png', $file);

            $zipFiles = ZipFilesHelper::zipFiles([$identification->file1Name,$identification->file2Name],$token.'.zip');
            Storage::put('zips/'.$token.'.zip', $zipFiles);
            
            //call data app 
            //$contents=Storage::readStream('zips/'.$token.'.zip');
            //$zip_file=stream_get_contents($contents);
            //$res = ProcessVerificationJob::dispatchNow($zip_file , 'token');
            //$res = json_decode($res);
            $matching = random_int(0, 1);
            $identification->matching = $matching;
            $identification->save();
            return view('processing' , compact('matching'));
        }   elseif($identification && $identification->status == 'processing') {
            $matching = $identification->matching;
            return view('processing' , compact('matching'));
        }
    }
}
