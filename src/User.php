<?php declare(strict_types=1);
namespace SimpleDingTalk;

class User{

    public static function getuserinfo(string $code){
        $uri=Config::$api['getuserinfo'];
        $query = [
            'code' => $code,
            'access_token'=>AccessToken::getToken()
        ];
        return apiRequest::get($uri, $query);
    }

    public static function create_user(array $data){
        $uri=apiRequest::joinParams(Config::$api['createuser'],[
            'access_token'=>AccessToken::getToken()
        ]);
        $json = $data;
        return apiRequest::post($uri, $json);
    }
} 