<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Storage;

use SimpleDingTalk\v2\ApiRequest;
use SimpleDingTalk\v2\Url;
use SimpleDingTalk\Config;

/**
 * 应用管理
 */
class App
{
     /**
     * 获取当前应用信息
     *
     * @param string $unionId
     * @return mixed
     */
    public static function getInfos(string $unionId)
    {
        $uri = Url::$api['storage'] . '/currentApps/query';

        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::post($uri);
    }
}