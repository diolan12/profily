<?php

namespace App;

use App\Models\Rest\User;
use Carbon\Exceptions\Exception;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;


class FirebaseHelper {

    private static $instance = null;

    public static function instance() {
        if (self::$instance == null) {
            self::$instance = new FirebaseHelper();
        }
        return self::$instance;
    }

    public function encode(User $account){
        $payload = array(
            "iss" => URL::to('/'), // base url server ini
            "sub" => "Authorization",
            "aud" => $account['nik'], // api key s3 status
            "iat" => Carbon::now(),
            "jti" => $account['nik'],
            "name" => $account['name'],
            "gender" => $account['gender'],
            "picture" => $account['photo'],
            "email" => $account['email'],
            "phone_number" => $account['phone'],
            "admin" => $account['role']
        );
        return JWT::encode($payload, privateKey, algorithm);
    }

    public function decode(String $jwt){
        try {
            return JWT::decode($jwt, publicKey, array(algorithm));
        } catch (Exception $exception) {
            throw $exception;
        }
    }

}