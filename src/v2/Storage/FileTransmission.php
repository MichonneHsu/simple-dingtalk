<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Storage;

use SimpleDingTalk\v2\ApiRequest;
use SimpleDingTalk\v2\Url;

/**
 * 文件传输
 */
class FileTransmission
{
    public static function uploadInfos(string $unionId, string $parentDentryUuid,array $body)
    {
        $uri = Url::$api['storage'] . "/spaces/files/$parentDentryUuid/uploadInfos/query";

        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::post($uri, $body);
    }
    public static function commit(string $unionId, string $parentDentryUuid,array $body)
    {
        $uri = Url::$api['storage'] . "/spaces/files/$parentDentryUuid/commit";

        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::post($uri, $body);
    }
    public static function downloadInfos(string $unionId, string $spaceId,string $dentryId,array $body)
    {
        $uri = Url::$api['storage'] . "/spaces/{$spaceId}/dentries/{$dentryId}/downloadInfos/query";

        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::post($uri, $body);
    }
   
}