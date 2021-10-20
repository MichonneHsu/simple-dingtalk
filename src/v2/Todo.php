<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;



class Todo
{
    public static function create(array $body){
        $unionId=UserInfo::$unionId;
        $uri=Url::$api['todo']."{$unionId}/tasks";
        $params=[
            'operatorId'=>$unionId
        ];
        $uri=apiRequest::joinParams($uri,$params);
        
       
        return apiRequest::post($uri,$body);
    }
  
    public static function get(string $taskId){
        $unionId=UserInfo::$unionId;
        $uri=Url::$api['todo']."{$unionId}/tasks";
        $params=[
            'operatorId'=>$unionId
        ];
        $uri=apiRequest::joinParams($uri,$params);
        
       
        return apiRequest::get($uri);
    }
}