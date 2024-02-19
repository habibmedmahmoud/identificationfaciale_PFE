<?php

namespace App\Helpers;

class RegisterHelper
{
    public static function  generateRandomString($length = 10) {
    $characters = '012ABCDEFGHIJ3456pqrstuvw789abcdefghijklmnoxyzKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return strtotime("now").$randomString;
    }
}
