<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;
use SimpleDingTalk\util\Time;
class Honor
{
    public static function getLists(string $nextToken='0', int $maxResults = 20)
    {

        $uri = Url::$api['honor']['getLists'];
        $params=[
            'nextToken'=>$nextToken,
            'maxResults'=>$maxResults
        ];
        $uri=ApiRequest::joinParams($uri,$params);
        return ApiRequest::get($uri);
    }
    public static function give(string $honorId,array $body)
    {

        $uri = Url::$api['honor']['give'].'/'.$honorId.'/grant';
        if(array_key_exists('expirationTime',$body)){
            $expirationTime=$body['expirationTime'];
            $body['expirationTime']=Time::toTime($expirationTime,true);
        }
        
        return ApiRequest::post($uri,$body);
    }
    public static function query(string $userId, string $nextToken='0',int $maxResults =20)
    {

        $uri = Url::$api['honor']['query']."/{$userId}";
        $params=[
            'nextToken'=>$nextToken,
            'maxResults'=>$maxResults
        ];
        $uri=ApiRequest::joinParams($uri,$params);
        return ApiRequest::get($uri);
    }
}
