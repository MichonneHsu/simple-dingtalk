<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;


/**
 * 待办任务
 */
class Todo
{
    /**
     * 新增钉钉待办任务
     *
     * @param string $unionId
     * @param array $body
     * @return mixed
     */
    public static function create(string $unionId,array $body)
    {
      

        $uri = Url::$api['todo'] . "{$unionId}/tasks";
        $params = [
            'operatorId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);

        return ApiRequest::post($uri, $body);
    }
    /**
     * 获取钉钉待办任务详情
     *
     * @param string $unionId
     * @param string $id
     * @return mixed
     */
    public static function get(string $unionId,string $id)
    {
    
        $uri = Url::$api['todo'] . "{$unionId}/tasks/$id";

        return ApiRequest::get($uri);
    }
    /**
     * 删除钉钉待办任务
     *
     * @param string $unionId
     * @param string $id
     * @return mixed
     */
    public static function remove(string $unionId,string $id)
    {
     
        $uri = Url::$api['todo'] . "{$unionId}/tasks/$id";
        $params = [
            'operatorId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);

        return ApiRequest::delete($uri);
    }
    /**
     * 更新钉钉待办任务
     *
     * @param string $unionId
     * @param string $id
     * @param array $body
     * @return mixed
     */
    public static function update(string $unionId,string $id, array $body)
    {
        
        $uri = Url::$api['todo'] . "{$unionId}/tasks/$id";
        $params = [
            'operatorId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);

        return ApiRequest::put($uri, $body);
    }
    /**
     * 更新钉钉待办执行者状态
     *
     * @param string $unionId
     * @param string $id
     * @param boolean $isDone
     * @return mixed
     */
    public static function status(string $unionId,string $id, bool $isDone)
    {
      
        $uri = Url::$api['todo'] . "{$unionId}/tasks/$id/executorStatus";
        $params = [
            'operatorId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        $body = [
            'executorStatusList' => [
                [
                    'id' => $unionId,
                    'isDone' => $isDone
                ]

            ]
        ];
        return ApiRequest::put($uri, $body);
    }
    /**
     * 根据sourceId获取钉钉待办任务详情
     *
     * @param string $unionId
     * @param string $sourceId
     * @return mixed
     */
    public static function get_by_sourceId(string $unionId,string $sourceId)
    {
      
        $uri = Url::$api['todo'] . "{$unionId}/tasks/sources/$sourceId";

        return ApiRequest::get($uri);
    }
    /**
     * 查询企业下用户待办列表
     *
     * @param string $unionId
     * @param boolean $isDone
     * @param string $nextToken
     * @return mixed
     */
    public static function query(string $unionId,bool $isDone, string $nextToken = '')
    {
      
        $uri = Url::$api['todo'] . "{$unionId}/org/tasks/query";


        $body = [

            'nextToken' => $nextToken,
            'isDone' => $isDone

        ];
        return ApiRequest::post($uri, $body);
    }
}
