<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Drive;

use SimpleDingTalk\v2\ApiRequest;
use SimpleDingTalk\v2\Url;
use SimpleDingTalk\Config;

/**
 * 存储
 */
class Storage
{
    /**
     * 获取企业信息
     *
     * @param string $unionId
     * @return mixed
     */
    public static function getOrgInfos(string $unionId)
    {
        $corpId = Config::getCorpId();
        $uri = Url::$api['storage'] . '/orgs/' . $corpId;
        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::get($uri);
    }
    /**
     * 以应用身份发送文件给指定用户
     *
     * @param string $unionId
     * @param string $spaceId
     * @param string $dentryId
     * @return mixed
     */
    public static function sendFile(string $unionId, string $spaceId, string $dentryId)
    {
        $uri = Url::$api['convFile'] . '/apps/conversations/files/send';
        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);

        $body = [
            'spaceId' => $spaceId,
            'dentryId' => $dentryId
        ];

        return ApiRequest::post($uri, $body);
    }

    /**
     * 获取当前应用信息
     *
     * @param string $unionId
     * @return mixed
     */
    public static function AppInfos(string $unionId)
    {
        $uri = Url::$api['storage'] . '/currentApps/query';

        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::post($uri);
    }
    /**
     * 添加空间
     *
     * @param string $unionId
     * @param array $body
     * @return mixed
     */
    public static function addSpece(string $unionId, array $body)
    {
        $uri = Url::$api['storage'] . '/spaces';
        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);

        return ApiRequest::post($uri, $body);
    }

    /**
     * 获取空间信息
     *
     * @param string $unionId
     * @param string $spaceId
     * @return mixed
     */
    public static function getSpeceInfo(string $unionId, string $spaceId)
    {
        $uri = Url::$api['storage'] . '/spaces/' . $spaceId;
        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);

        return ApiRequest::get($uri);
    }
}
