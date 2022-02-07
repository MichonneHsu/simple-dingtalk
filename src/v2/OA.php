<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;
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
      

        $uri = Url::$api['oa']['workflow'];

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
      

        $uri = Url::$api['oa']['workflow'].'/schemas/processCodes';
        $params = [
            'processCode' => $processCode
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::get($uri);
    }
}