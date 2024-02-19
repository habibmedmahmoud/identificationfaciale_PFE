<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Identification;

class VerificationController extends Controller
{
    //verifier token puis redirect to etape detection de visage 
    public function verifyToken($token){
        $user =  Identification::where('token',$token)->get();
        // check if token exist 
        if ($user) {
            //chek if token not expire ? 
            $user = $user->first();
            if ($user->tokenValideTo >= date("Y-m-d H:i:s")) {
                $user->status = 'email verifie';
                $user->save();
                $token = $user->token;
                return view('face_detection',compact('token'));
            }else{ // token is expired  
                $message = 'le token a expiré';
                return view('error',compact('message'));
            }
        }else { // token is not valide
                $message = 'le token n\'est pas valide';
                return view('error',compact('message'));
        }
    }
}
