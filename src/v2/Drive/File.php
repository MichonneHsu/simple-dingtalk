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
     * @return mixed
     */
    public static function get_list(string $unionId, string $spaceId,string $parentId,int $maxResults,string $orderType='createTimeDesc',string $nextToken='')
    {
        $uri = Url::$api['drive']."/$spaceId/files";

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
    /**
     * 查询文件（夹）信息
     *
     * @param string $unionId
     * @param string $spaceId
     * @param string $fileId
     * @return mixed
     */
    public static function get_info(string $unionId, string $spaceId,string $fileId)
    {
        $uri = Url::$api['drive']."/$spaceId/files/$fileId";

        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::get($uri);
    }
    /**
     * 添加文件（夹）
     *
     * @param string $unionId
     * @param string $spaceId
     * @param string $fileType
     * @param string $fileName
     * @param string $parentId
     * @param string $mediaId
     * @param string $addConflictPolicy
     * @return mixed
     */
    public static function create(string $unionId, string $spaceId,string $fileType,string $fileName,string $parentId='',string $mediaId='',string $addConflictPolicy='')
    {
        $uri = Url::$api['drive']."/$spaceId/files";

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
    /**
     * 删除文件（夹）
     *
     * @param string $unionId
     * @param string $spaceId
     * @param string $fileId
     * @param string $deletePolicy
     * @return mixed
     */
    public static function remove(string $unionId, string $spaceId,string $fileId,string $deletePolicy='toRecycle')
    {
        $uri = Url::$api['drive']."/$spaceId/files/$fileId";

        $params = [
            'unionId' => $unionId,
            'deletePolicy'=>$deletePolicy
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::delete($uri);
    }
    /**
     * 移动文件（夹）
     *
     * @param string $unionId
     * @param string $spaceId
     * @param string $fileId
     * @param string $targetSpaceId
     * @param string $targetParentId
     * @param string $addConflictPolicy
     * @return mixed
     */
    public static function move(string $unionId, string $spaceId,string $fileId,string $targetSpaceId,string $targetParentId='',string $addConflictPolicy='returnError')
    {
        $uri = Url::$api['drive']."/$spaceId/files/$fileId/move";

        $body = [
            'unionId' => $unionId,
            'targetSpaceId'=>$targetSpaceId,
            'targetParentId'=>$targetParentId,
            'addConflictPolicy'=>$addConflictPolicy
        ];
       
        return ApiRequest::post($uri,$body);
    }
    /**
     * 修改文件（夹）名
     *
     * @param string $unionId
     * @param string $spaceId
     * @param string $fileId
     * @param string $newFileName
     * @return mixed
     */
    public static function rename(string $unionId, string $spaceId,string $fileId,string $newFileName)
    {
        $uri = Url::$api['drive']."/$spaceId/files/$fileId/rename";

        $body = [
            'unionId' => $unionId,
            'newFileName'=>$newFileName
        ];
       
        return ApiRequest::post($uri,$body);
    }
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
