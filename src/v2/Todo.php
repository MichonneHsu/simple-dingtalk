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
  
    public static function get(string $id){
        $unionId=UserInfo::$unionId;
        $uri=Url::$api['todo']."{$unionId}/tasks/$id";
       
        return apiRequest::get($uri);
    }
    public static function remove(string $id){
        $unionId=UserInfo::$unionId;
        $uri=Url::$api['todo']."{$unionId}/tasks/$id";
        $params=[
            'operatorId'=>$unionId
        ];
        $uri=apiRequest::joinParams($uri,$params);

        return apiRequest::delete($uri);
    }
    public static function update(array $body){
        $unionId=UserInfo::$unionId;
        $uri=Url::$api['todo']."{$unionId}/tasks";
        $params=[
            'operatorId'=>$unionId
        ];
        $uri=apiRequest::joinParams($uri,$params);
       
        return apiRequest::put($uri,$body);
    }
    public static function status(string $id,bool $isDone){
        $unionId=UserInfo::$unionId;
        $uri=Url::$api['todo']."{$unionId}/tasks/$id/executorStatus";
        $params=[
            'operatorId'=>$unionId
        ];
        $uri=apiRequest::joinParams($uri,$params);
        $body=[
            'executorStatusList'=>[
                'id'=>$unionId,
                'isDone'=>$isDone
            ]
        ];
        return apiRequest::put($uri,$body);
    }
    public static function get_by_sourceId(string $sourceId){
        $unionId=UserInfo::$unionId;
        $uri=Url::$api['todo']."{$unionId}/tasks/sources/$sourceId";
       
        return apiRequest::get($uri);
    }
    public static function query(string $nextToken='',bool $isDone){
        $unionId=UserInfo::$unionId;
        $uri=Url::$api['todo']."{$unionId}/org/tasks/query";
       
      
        $body=[
            'executorStatusList'=>[
                'nextToken'=>$nextToken,
                'isDone'=>$isDone
            ]
        ];
        return apiRequest::post($uri,$body);
    }
}