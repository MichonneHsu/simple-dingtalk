<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Drive;
use SimpleDingTalk\v2\ApiRequest;
use SimpleDingTalk\v2\Url;
/**
 * 文件管理
 */
class File
{
   
    /**
     * 查询文件（夹）列表
     *
     * @param string $unionId
     * @param string $spaceId
     * @param string $parentId
     * @param string $maxResults
     * @param string $orderType
     * @param string $nextToken
     * @return void
     */
    public static function get_list(string $unionId, string $spaceId,string $parentId,string $maxResults,string $orderType='createTimeDesc',string $nextToken='')
    {
        $uri = Url::$api['drive'].$spaceId.'/files';

        $params = [
            'unionId' => $unionId,
            'parentId'=>$parentId,
            'maxResults'=>$maxResults,
            'orderType'=>$orderType,
            'nextToken'=>$nextToken
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::get($uri);
    }

    public static function get_info(string $unionId, string $spaceId,string $fileId)
    {
        $uri = Url::$api['drive']."$spaceId/files/$fileId";

        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::get($uri);
    }

    public static function create(string $unionId, string $spaceId,string $fileType,string $fileName,string $parentId='',string $mediaId='',string $addConflictPolicy='')
    {
        $uri = Url::$api['drive']."$spaceId/files";

        $body = [
            'unionId' => $unionId,
            'fileType'=>$fileType,
            'fileName'=>$fileName,
            'parentId'=>$parentId,
            'mediaId'=>$mediaId,
            'addConflictPolicy'=>$addConflictPolicy
        ];
     
        return ApiRequest::post($uri,$body);
    }
    public static function remove(string $unionId, string $spaceId,string $fileId,string $deletePolicy='toRecycle')
    {
        $uri = Url::$api['drive']."$spaceId/files/$fileId";

        $params = [
            'unionId' => $unionId,
            'deletePolicy'=>$deletePolicy
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::delete($uri);
    }
}
