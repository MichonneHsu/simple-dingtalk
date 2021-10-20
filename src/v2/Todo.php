<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;



class Todo
{
    public static function create(array $json){
        $unionId=UserInfo::$unionId;
        $uri=Url::$api['todo']."{$unionId}/tasks";
        $params=[
            'operatorId'=>$unionId
        ];
        $uri=apiRequest::joinParams($uri,$params);
        

        return apiRequest::post($uri,$json);
    }
    public static function test(){
    
        $a=[
            'a'=>1
        ];
        return apiRequest::REST('get','http://www.wxshop.com',json_encode($a));
    }
    
}