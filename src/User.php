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

    public static function create_user(array $json){
        $uri=apiRequest::joinParams(Config::$api['createuser'],[
            'access_token'=>AccessToken::getToken()
        ]);
       
        return apiRequest::post($uri, $json);
    }
    public static function update_user(array $json){
        $uri=apiRequest::joinParams(Config::$api['updateuser'],[
            'access_token'=>AccessToken::getToken()
        ]);
        
        return apiRequest::post($uri, $json);
    }
    public static function remove_user(string $userid){
        $uri=apiRequest::joinParams(Config::$api['deleteuser'],[
            'access_token'=>AccessToken::getToken()
        ]);
        $json=[
            'userid'=>$userid
        ];
        return apiRequest::post($uri, $json);
    }
} 