<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;

use SimpleDingTalk\Config;

/**
 * OA审批
 */
class OA{
    /**
     * 创建或修改审批表单模板
     *
     * @param array $body
     * @return mixed
     */
    public static function save(array $body)
    {
      

        $uri = Url::$api['oa']['workflow'].'/forms';

        return ApiRequest::post($uri, $body);
    }
    /**
     * 获取表单 schema
     *
     * @param string $processCode
     * @return mixed
     */
    public static function getByProcessCode (string $processCode)
    {
      

        $uri = Url::$api['oa']['workflow'].'/forms/schemas/processCodes';
        $params = [
            'processCode' => $processCode
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::get($uri);
    }
    /**
     * 获取审批单流程中的节点信息
     *
     * @param array $body
     * @return mixed
     */
    public static function forecast(array $body){
        $uri = Url::$api['oa']['workflow'].'/processes/forecast';
       
        return ApiRequest::post($uri,$body);
    }
    /**
     * 发起审批实例
     *
     * @param array $body
     * @return mixed
     */
    public static function request(array $body){
        $app=Config::getApp();
        $uri = Url::$api['oa']['workflow'].'/processInstances';
        $body['microappAgentId']=$app['info']['AGENT_ID'];
        return ApiRequest::post($uri,$body);
    }
}