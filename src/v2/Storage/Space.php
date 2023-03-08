<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Storage;

use SimpleDingTalk\v2\ApiRequest;
use SimpleDingTalk\v2\Url;
use SimpleDingTalk\Config;

/**
 * 空间管理
 */
class Space
{
     /**
     * 添加空间
     *
     * @param string $unionId
     * @param array $body
     * @return mixed
     */
    public static function addSpace(string $unionId, array $body)
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
    public static function getSpaceInfo(string $unionId, string $spaceId)
    {
        $uri = Url::$api['storage'] . '/spaces/' . $spaceId;
        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);

        return ApiRequest::get($uri);
    }
}