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
        $body=self::body($body);
        return ApiRequest::post($uri, $body);
    }
    public static function update(array $body){
        $uri = Url::$api['interactiveCard'][self::$version]['instances'];
        $body=self::body($body);
        return ApiRequest::put($uri, $body);
    }
    public static function deliver(array $body){
        
        $body=self::body($body);
        $uri = Url::$api['interactiveCard'][self::$version]['deliver'];
        return ApiRequest::post($uri, $body);
    }
    public static function createAndDeliver(array $body){
        $uri = Url::$api['interactiveCard'][self::$version]['createAndDeliver'];
        $body=self::body($body);
       
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

    private static function body(array $body){
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
        if(true==array_key_exists('cardData',$body)){
            $cardParamMap=$body['cardData']['cardParamMap'];
            $body['cardData']['cardParamMap']=['sys_full_json_obj'=>json_encode($cardParamMap)];
        }
        if(true==array_key_exists('privateData',$body)){
            $cardParamMap=$body['privateData'];

            foreach($cardParamMap as $k=>$v){
                $cardParamMap[$k]['cardParamMap']=['sys_full_json_obj'=>json_encode($v['cardParamMap'])];
            }
            $body['privateData']=$cardParamMap;
        }
        return $body;
    }
}