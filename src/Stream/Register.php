<?php

declare(strict_types=1);

namespace SimpleDingTalk\Stream;
use SimpleDingTalk\v2\{Url,ApiRequest};
use SimpleDingTalk\Config;
class Register{
    
   
    public static function init(array $subscriptions){
        $app=Config::getApp();
        $uri=Url::$api['register']['v1']['gateway'];
        $body=[
            'clientId'=>$app['APP_KEY'],
            'clientSecret'=>$app['APP_SECRET'],
            'subscriptions'=>$subscriptions
        ];
        $res=ApiRequest::http_request("POST",$uri,$body,false);


        return $res;
    }
}