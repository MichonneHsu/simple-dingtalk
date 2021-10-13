<?php declare(strict_types=1);
namespace SimpleDingTalk;

class HumanResource{
    public static function queryonjob(string $status_list,int $size,int $offset=0)
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
    public static function querypreentry(int $size,int $offset=0)
    {
        $uri = Url::joinParams(Url::$api['humanResource']['querypreentry'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json=[
            'offset'=>$offset,
            'size'=>$size
        ];
        return apiRequest::post($uri, $json);
    }
    public static function listdimission(string $userid_list)
    {
        $uri = Url::joinParams(Url::$api['humanResource']['listdimission'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json=[
            'userid_list'=>$userid_list
        ];
        return apiRequest::post($uri, $json);
    }
    public static function querydimission(int $size,int $offset=0)
    {
        $uri = Url::joinParams(Url::$api['humanResource']['querydimission'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json=[
            'offset'=>$offset,
            'size'=>$size
        ];
     
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