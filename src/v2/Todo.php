<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;



class Todo
{
    public static function create(array $json){
        $unionId=UserInfo::$unionId;
        $uri='/v1.0/todo/users/'.$unionId.'tasks/';
        $params=[
            'operatorId'=>$unionId
        ];
        $uri=apiRequest::joinParams($uri,$params);
        

        return apiRequest::post($uri,$json);
    }
}