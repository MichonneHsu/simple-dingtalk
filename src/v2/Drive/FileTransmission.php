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
    public static function downloadInfos(string $unionId, string $spaceId,string $fileId,bool $withRegion=false,bool $withInternalResourceUrl=false)
    {
        $uri = Url::$api['drive']."/$spaceId/files/$fileId/downloadInfos";

        $params = [
            'unionId' => $unionId,
            'withRegion'=>$withRegion,
            'withInternalResourceUrl'=>$withInternalResourceUrl
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::get($uri);
    }
    /**
     * 获取文件上传信息
     *
     * @param string $unionId
     * @param string $spaceId
     * @param string $fileId
     * @param string $fileName
     * @param string $fileSize
     * @return mixed
     */
    public static function uploadInfos(string $unionId, string $spaceId,string $parentId,string $fileName,string $fileSize)
    {
        $uri = Url::$api['drive']."/$spaceId/files/$parentId/uploadInfos";

        $params = [
            'unionId' => $unionId,
            'fileName'=>$fileName,
            'fileSize'=>$fileSize
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::get($uri);
    }
}