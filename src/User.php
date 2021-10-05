<?php declare(strict_types=1);
namespace SimpleDingtalk;

use SimpleDingTalk\apiRequest;

final class User{
    public static function getuserinfo(string $code){
        $uri = apiRequest::joinParams(Uri::$api['getuserinfo'],[
            'access_token'=>
        ]);
        $query = [
            'code' => $code
        ];
        $json = apiRequest::get($uri, $query);
    }
} 