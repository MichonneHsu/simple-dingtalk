<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;

use SimpleDingTalk\Config;
/**
 * 自有审批
 */
class OAPC{

    public function save(array $body){
        $uri = Url::$api['oa']['processCentres'] . '/schemas';
        return ApiRequest::post($uri, $body);
    }
    public function getCode(string $name){
        $uri = Url::$api['oa']['processCentres'] . '/schemaNames/processCodes';
        $params=[
            'name'=>$name
        ];
        $uri=ApiRequest::joinParams($uri,$params);
        return ApiRequest::get($uri);
    }
    public function remove(array $params){
        $uri = Url::$api['oa']['processCentres'] . '/schemas';
        $uri=ApiRequest::joinParams($uri,$params);
        return ApiRequest::delete($uri);
    }
    public function create(array $body){
        $uri = Url::$api['oa']['processCentres'] . '/instances';
     
        return ApiRequest::post($uri,$body);
    }
    public function update(array $body){
        $uri = Url::$api['oa']['processCentres'] . '/instances/batch';
     
        return ApiRequest::put($uri,$body);
    }
    public function tasksCreate(array $body){
        $uri = Url::$api['oa']['processCentres'] . '/tasks';
     
        return ApiRequest::post($uri,$body);
    }
    public function todoTasks(array $params){
        $uri = Url::$api['oa']['processCentres'] . '/todoTasks';
        $uri=ApiRequest::joinParams($uri,$params);
        return ApiRequest::get($uri);
    }
    public function tasksUpdate(array $body){
        $uri = Url::$api['oa']['processCentres'] . '/tasks';
        return ApiRequest::put($uri,$body);
    }
    public function tasksCancel(array $body){
        $uri = Url::$api['oa']['processCentres'] . '/tasks/cancel';
        return ApiRequest::put($uri,$body);
    }
}