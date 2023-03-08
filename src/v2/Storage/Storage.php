<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Storage;

use SimpleDingTalk\v2\ApiRequest;
use SimpleDingTalk\v2\Url;
use SimpleDingTalk\Config;

/**
 * 存储
 */
class Storage
{
   
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

    
}
