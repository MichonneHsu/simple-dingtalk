<?php declare(strict_types=1);
namespace SimpleDingTalk;

final class User{
    public static function getuserinfo(string $code){
        $query = [
            'code' => $code,
            'access_token'=>AccessToken::getToken()
        ];
        return apiRequest::get(Config::$api['getuserinfo'], $query);
    }
} 