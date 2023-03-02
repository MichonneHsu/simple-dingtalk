<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;

use SimpleDingTalk\Config;
/**
 * 自有审批
 */
class OAPC{

    public static function save(array $body){
        $uri = Url::$api['oa']['processCentres'] . '/schemas';
        return ApiRequest::post($uri, $body);
    }
    public static function getCode(string $name){
        $uri = Url::$api['oa']['processCentres'] . '/schemaNames/processCodes';
        $params=[
            'name'=>$name
        ];
        $uri=ApiRequest::joinParams($uri,$params);
        return ApiRequest::get($uri);
    }
    public static function remove(array $params){
        $uri = Url::$api['oa']['processCentres'] . '/schemas';
        $uri=ApiRequest::joinParams($uri,$params);
        return ApiRequest::delete($uri);
    }
    public static function create(array $body){
        $uri = Url::$api['oa']['processCentres'] . '/instances';
     
        return ApiRequest::post($uri,$body);
    }
    public static function update(array $body){
        $uri = Url::$api['oa']['processCentres'] . '/instances';
     
        return ApiRequest::put($uri,$body);
    }
    public static function batchUpdate(array $body){
        $uri = Url::$api['oa']['processCentres'] . '/instances/batch';
     
        return ApiRequest::put($uri,$body);
    }
    public static function tasksCreate(array $body){
        $uri = Url::$api['oa']['processCentres'] . '/tasks';
     
        return ApiRequest::post($uri,$body);
    }
    public static function todoTasks(array $params){
        $uri = Url::$api['oa']['processCentres'] . '/todoTasks';
        $uri=ApiRequest::joinParams($uri,$params);
        return ApiRequest::get($uri);
    }
    public static function tasksUpdate(array $body){
        $uri = Url::$api['oa']['processCentres'] . '/tasks';
        return ApiRequest::put($uri,$body);
    }
    public static function tasksCancel(array $body){
        $uri = Url::$api['oa']['processCentres'] . '/tasks/cancel';
        return ApiRequest::put($uri,$body);
    }
}