<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;

use SimpleDingTalk\Config;

/**
 * OA审批
 */
class OA
{
    /**
     * 创建或修改审批表单模板
     *
     * @param array $body
     * @return mixed
     */
    public static function save(array $body)
    {


        $uri = Url::$api['oa']['workflow'] . '/forms';

        return ApiRequest::post($uri, $body);
    }
    /**
     * 获取表单 schema
     *
     * @param string $processCode
     * @return mixed
     */
    public static function getByProcessCode(string $processCode)
    {


        $uri = Url::$api['oa']['workflow'] . '/forms/schemas/processCodes';
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
    public static function forecast(array $body)
    {
        $uri = Url::$api['oa']['workflow'] . '/processes/forecast';

        return ApiRequest::post($uri, $body);
    }
    /**
     * 发起审批实例
     *
     * @param array $body
     * @return mixed
     */
    public static function request(array $body)
    {
        $app = Config::getApp();
        $uri = Url::$api['oa']['workflow'] . '/processInstances';
        $body['microappAgentId'] = $app['info']['AGENT_ID'];
        return ApiRequest::post($uri, $body);
    }
    /**
     * 获取单个审批实例详情
     *
     * @param string $processInstanceId
     * @return mixed
     */
    public static function getInstance(string $processInstanceId)
    {

        $uri = Url::$api['oa']['workflow'] . '/processInstances';
        $params = [
            'processInstanceId' => $processInstanceId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::get($uri);
    }
    /**
     * 获取审批钉盘空间信息
     *
     * @param string $userId
     * @return mixed
     */
    public static function spaceInfos(string $userId)
    {

        $uri = Url::$api['oa']['workflow'] . '/processInstances/spaces/infos/query';
        $body = [
            'userId' => $userId
        ];
        return ApiRequest::post($uri, $body);
    }
    /**
     * 添加审批评论
     *
     * @param array $body
     * @return mixed
     */
    public static function comments(array $body)
    {

        $uri = Url::$api['oa']['workflow'] . '/processInstances/comments';

        return ApiRequest::post($uri, $body);
    }
    /**
     * 同意或拒绝审批任务
     *
     * @param array $body
     * @return mixed
     */
    public static function execute(array $body)
    {

        $uri = Url::$api['oa']['workflow'] . '/processInstances/execute';

        return ApiRequest::post($uri, $body);
    }
    /**
     * 撤销审批实例
     *
     * @param array $body
     * @return mixed
     */
    public static function terminate(array $body)
    {

        $uri = Url::$api['oa']['workflow'] . '/processInstances/terminate';

        return ApiRequest::post($uri, $body);
    }
    /**
     * 授权预览审批附件
     *
     * @param array $body
     * @return mixed
     */
    public static function spaceAuthPreview(array $body)
    {

        $uri = Url::$api['oa']['workflow'] . '/processInstances/spaces/authPreview';

        return ApiRequest::post($uri, $body);
    }
    /**
     * 下授权下载审批钉盘文件
     *
     * @param array $body
     * @return mixed
     */
    public static function fileAuthPreview(array $body)
    {

        $uri = Url::$api['oa']['workflow'] . '/processInstances/spaces/files/authDownload';

        return ApiRequest::post($uri, $body);
    }
    /**
     * 下载审批附件
     *
     * @param string $processInstanceId
     * @param string $fileId
     * @return mixed
     */
    public static function fileDownload(string $processInstanceId, string $fileId)
    {

        $uri = Url::$api['oa']['workflow'] . '/processInstances/files/urls/download';
        $body = [
            'processInstanceId' => $processInstanceId,
            'fileId' => $fileId
        ];
        return ApiRequest::post($uri, $body);
    }
    /**
     * 获取用户待审批数量
     *
     * @param string $userId
     * @return mixed
     */
    public static function tasksNumber(string $userId)
    {

        $uri = Url::$api['oa']['workflow'] . '/processes/todoTasks/numbers';
        $params = [
            'userId' => $userId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::get($uri);
    }
    /**
     * 获取指定用户可见的审批表单列表
     *
     * @param array $params
     * @return mixed
     */
    public static function templatesUserVisibilities(array $params)
    {

        $uri = Url::$api['oa']['workflow'] . '/processes/userVisibilities/templates';

        $uri = ApiRequest::joinParams($uri, $params);

        return ApiRequest::get($uri);
    }
    /**
     * 获取当前企业所有可管理的表单
     *
     * @param string $userId
     * @return mixed
     */
    public static function templatesManagements(string $userId)
    {

        $uri = Url::$api['oa']['workflow'] . '/processes/managements/templates';
        $params = [
            'userId' => $userId
        ];
        $uri = ApiRequest::joinParams($uri, $params);

        return ApiRequest::get($uri);
    }
}
