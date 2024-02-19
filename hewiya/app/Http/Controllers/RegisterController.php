<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Identification;
use Illuminate\Support\Facades\Storage;
use App\Helpers\ZipFilesHelper;
use App\Mail\SendMailTokenVerification;
use App\Helpers\RegisterHelper;
use App\Helpers\MailHelper;


class RegisterController extends Controller
{
    public function create(){
        return view('register');
    }

    public function store(Request $request){
        $request->validate([
            'email'         => 'required|email',
            'firstName'     => 'required',
            'lastName'      => 'required',
            'file'          => 'mimes:jpeg,jpg,png|required',
            'nni'           => 'required',
            'tel'           => 'required',
            'type_document' => 'required'
        ]);

        $identitfication = new Identification();
        $identitfication->email = $request->email;
        $identitfication->firstName = $request->firstName;
        $identitfication->lastName = $request->lastName;
        $identitfication->file1Name = strtotime("now").'_'.$request->file('file')->getClientOriginalName();
        $identitfication->token = RegisterHelper::generateRandomString(32);
        $identitfication->tokenValideTo = date("Y-m-d H:i:s", strtotime("+1 hours"));
        $identitfication->status = 'register';
        $identitfication->nni = $request->nni;
        $identitfication->tel = $request->tel;
        $identitfication->type_document = $request->type_document;
        $identitfication->save();
        Storage::put('images/'.$identitfication->file1Name,file_get_contents($request->file('file')));
        //send email with token verification 
        MailHelper::sendEmail($identitfication->email, $identitfication->token);
        //redirect back 
        return redirect()->back()->with('success', 'un mail a été envoyé à '.$identitfication->email.' pour la confirmation'); 
    }
    
    public function taekScreenshotImage(Request $request){
        // decode the base64 file 
        $token = $request->userToken ;
        $identification = Identification::where('token',$token)->get()->first();
        if ($identification) {
            $identification->file2Name = $token.'.png';
            $identification->status = 'processing';
            $identification->save();

            $file = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '',$request->bineryImage)); 
            Storage::put('images/'.$token.'.png', $file);

            $zipFiles = ZipFilesHelper::zipFiles([$identification->file1Name,$identification->file2Name],$token.'.zip');
            Storage::put('zips/'.$token.'.zip', $zipFiles);
            
            return view('processing');
        }
        
    }
    
    public function processing(){

    }
    /*public function goStepTwo($token){
        $user =  Identification::where('token',$token)->get();
        // check if token exist 
        if ($user) {
            //chek if token not expire 
            $user = $user->first();
            if ($user->tokenValideTo >= date("Y-m-d H:i:s")) {
                $this->mail($token,$user->email);
                return redirect()->back()->with('success','un mail a ete envoye a sur l\'email '.$user->email.' pour la validation !');
            }else{ // token expired view 
                $message = 'le token a expiré';
             return view('error',compact('message'));
            }
        }else { // token not valide view
            $message = 'le token n\'est pas valide';
             return view('error',compact('message'));
        }
    }

    public function goFaceDetection($token){
        $user =  Identification::where('token',$token)->get()->first();
        
        if ($user->tokenValideTo >= date("Y-m-d H:i:s")) {
           $user->status = 'verifie' ;
           $user->save();
           return view('face_detection',compact('token'));
        }
    }

    public function submit_screenshott(Request $request){
        // decode the base64 file 
        $identification = Identification::where('token',$request->token)->get()->first();
        if ($identification) {
            $identification->file2Name = $request->token.'.png';
            $identification->status = 'processing';
            $identification->save();
        }

        $file = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '',$request->image)); 
        Storage::put('images/'.$request->token.'.png', $file);

        $zipFiles = ZipFileHelper::zipFiles([$identification->file1Name,$identification->file2Name],'identificatio.zip');
        
        //call data routes 
    }

    public function mail($email , $token)
    {
        $email = 'cheikh.m@1cv1job.io';
   
        $maildata = [
            'title' => 'Email verification',
            'route' => 'faceDetection'
        ];
        Mail::to($email)->send(new SendMailTokenVerification($maildata));
    }*/
}
