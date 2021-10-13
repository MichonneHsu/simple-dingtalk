<?php declare(strict_types=1);
namespace SimpleDingTalk;

class HumanResource{
    public static function queryonjob(string $status_list,int $offset=0,int $size)
    {
        $uri = Url::joinParams(Url::$api['humanResource']['queryonjob'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json=[
            'status_list'=>$status_list,
            'offset'=>$offset,
            'size'=>$size
        ];
        return apiRequest::post($uri, $json);
    }
    public static function querypreentry(array $json)
    {
        $uri = Url::joinParams(Url::$api['humanResource']['querypreentry'], [
            'access_token' => AccessToken::getToken()
        ]);
       
        return apiRequest::post($uri, $json);
    }
    public static function listdimission(array $json)
    {
        $uri = Url::joinParams(Url::$api['humanResource']['listdimission'], [
            'access_token' => AccessToken::getToken()
        ]);
       
        return apiRequest::post($uri, $json);
    }
    public static function querydimission(array $json)
    {
        $uri = Url::joinParams(Url::$api['humanResource']['querydimission'], [
            'access_token' => AccessToken::getToken()
        ]);
       
        return apiRequest::post($uri, $json);
    }
    public static function addpreentry(array $json)
    {
        $uri = Url::joinParams(Url::$api['humanResource']['addpreentry'], [
            'access_token' => AccessToken::getToken()
        ]);
       
        return apiRequest::post($uri, $json);
    }
}