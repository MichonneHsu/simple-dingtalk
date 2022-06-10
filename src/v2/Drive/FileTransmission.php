<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Drive;

use SimpleDingTalk\v2\ApiRequest;
use SimpleDingTalk\v2\Url;

/**
 * 文件传输
 */
class FileTransmission
{
    /**
     * 获取文件下载信息
     *
     * @param string $unionId
     * @param string $spaceId
     * @param string $fileId
     * @param boolean $withRegion
     * @param boolean $withInternalResourceUrl
     * @return mixed
     */
    public static function downloadInfos(string $unionId, string $spaceId, string $fileId, bool $withRegion = false, bool $withInternalResourceUrl = false)
    {
        $uri = Url::$api['drive'] . "/$spaceId/files/$fileId/downloadInfos";

        $params = [
            'unionId' => $unionId,
            'withRegion' => $withRegion,
            'withInternalResourceUrl' => $withInternalResourceUrl
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::get($uri);
    }
    /**
     * 获取文件上传信息
     *
     * @param string $unionId
     * @param string $fileName
     * @param integer $fileSize
     * @param string $md5
     * @param string $spaceId
     * @param string $parentId
     * @param string $addConflictPolicy
     * @param string $mediaId
     * @return mixed
     */
    public static function uploadInfos(string $unionId, string $fileName, int $fileSize, string $md5, string $spaceId, string $parentId,  string $mediaId = '',string $addConflictPolicy = 'returnError')
    {
        $uri = Url::$api['drive'] . "/$spaceId/files/$parentId/uploadInfos";

        $params = [
            'unionId' => $unionId,
            'fileName' => $fileName,
            'fileSize' => $fileSize,
            'md5' => $md5,
            'addConflictPolicy' => $addConflictPolicy
            
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::get($uri);
    }
}
