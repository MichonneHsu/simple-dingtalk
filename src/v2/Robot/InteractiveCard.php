<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Robot;

use SimpleDingTalk\Config;
use SimpleDingTalk\v2\Url;

class InteractiveCard
{
    private static $version='v1';
    public static function create(array $body){
        $uri = Url::$api['interactiveCard'][self::$version]['instances'];
        $cardParamMap=$body['cardData']['cardParamMap'];
        $body['cardData']['cardParamMap']=json_encode($cardParamMap,JSON_UNESCAPED_UNICODE);
        return ApiRequest::post($uri, $body);
    }
    public static function update(array $body){
        $uri = Url::$api['interactiveCard'][self::$version]['instances'];
        return ApiRequest::put($uri, $body);
    }
    public static function deliver(array $body){
        
        $app=Config::getApp();
       
        $robotCode=[
            'robotCode'=>$app['info']['ROBOT_CODE']
        ];
        if(true==array_key_exists('imRobotOpenDeliverModel',$body)){
            $imRobotOpenDeliverModel=$body['imRobotOpenDeliverModel'];
            $body['imRobotOpenDeliverModel']=array_merge($imRobotOpenDeliverModel,$robotCode);
        }
        if(true==array_key_exists('imGroupOpenDeliverModel',$body)){
            $imGroupOpenDeliverModel=$body['imGroupOpenDeliverModel'];
            $body['imGroupOpenDeliverModel']=array_merge($imGroupOpenDeliverModel,$robotCode);
            if(count($body['imGroupOpenDeliverModel']['extension'])>1){
                throw new \Exception("extension cannot be more than one", 1);
            }
        }
        $uri = Url::$api['interactiveCard'][self::$version]['deliver'];
        return ApiRequest::post($uri, $body);
    }
    public static function createAndDeliver(array $body){
        $uri = Url::$api['interactiveCard'][self::$version]['createAndDeliver'];
        return ApiRequest::post($uri, $body);
    }
    public static function register(array $body){
        $uri = Url::$api['interactiveCard'][self::$version]['register'];
        return ApiRequest::post($uri, $body);
    }
    public static function spaces(array $body){
        $uri = Url::$api['interactiveCard'][self::$version]['spaces'];
        return ApiRequest::put($uri, $body);
    }
}