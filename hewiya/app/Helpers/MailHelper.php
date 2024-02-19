<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Storage;
use App\Mail\SendMailTokenVerification;
use Illuminate\Support\Facades\Mail;

class MailHelper
{
    public static function sendEmail($email , $token)
    {
        $maildata = [
            'token' => $token
        ];
        Mail::to($email)->send(new SendMailTokenVerification($maildata));
    }
}
