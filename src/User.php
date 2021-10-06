<?php declare(strict_types=1);
namespace SimpleDingtalk;

final class User{
    public static function getuserinfo(string $code){
        $uri = apiRequest::joinParams(Config::$api['getuserinfo'],[
            'access_token'=>AccessToken::getToken()
        ]);
        $query = [
            'code' => $code
        ];
        return apiRequest::get($uri, $query);
    }
} 