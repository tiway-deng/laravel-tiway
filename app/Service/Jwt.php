<?php


namespace App\Service;

use Firebase\JWT\JWT as JwtService;
use Firebase\JWT\Key;

class Jwt
{
    protected static $key = 'laravel-tiway';

    //加密
    public static function createToken($userId, $nickname)
    {
        $payload = array(
            "iss" => "http://example.org",
            "aud" => "http://example.com",
            'exp' => time() + (24 * 3600),
            'user_id' => $userId,
            'nickname' => $nickname,
        );
        $jwt = JwtService::encode($payload, self::$key, 'HS256');
        return $jwt;
    }

    //解密
    public static function decodeToken($jwt)
    {
        $decoded = JwtService::decode($jwt, new Key(self::$key, 'HS256'));
        if ($decoded) {
            return $decoded;
        } else {
            return false;
        }

    }
}
