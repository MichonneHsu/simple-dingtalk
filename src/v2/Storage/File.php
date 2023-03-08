<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Storage;

use SimpleDingTalk\v2\ApiRequest;
use SimpleDingTalk\v2\Url;
use SimpleDingTalk\Config;

/**
 * 应用管理
 */
class File
{
    /**
     * 添加文件夹
     *
     * @param string $unionId
     * @param string $spaceId
     * @param string $parentId
     * @param array $body
     * @return mixed
     */
    public static function create(string $unionId, string $spaceId, string $parentId, array $body)
    {
        $uri = Url::$api['storage'] . "/spaces/{$spaceId}/dentries/{$parentId}/folders";

        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::post($uri, $body);
    }
    /**
     * 复制文件或文件夹
     *
     * @param string $unionId
     * @param string $spaceId
     * @param string $dentryId
     * @param array $body
     * @return mixed
     */
    public static function copy(string $unionId, string $spaceId, string $dentryId, array $body)
    {
        $uri = Url::$api['storage'] . "/spaces/{$spaceId}/dentries/{$dentryId}/copy";

        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::post($uri, $body);
    }
    /**
     * 批量复制文件或文件夹
     *
     * @param string $unionId
     * @param string $spaceId
     * @param array $body
     * @return mixed
     */
    public static function batchCopy(string $unionId, string $spaceId, array $body)
    {
        $uri = Url::$api['storage'] . "/spaces/{$spaceId}/dentries/batchCopy";

        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::post($uri, $body);
    }
    /**
     * 移动文件或文件夹
     *
     * @param string $unionId
     * @param string $spaceId
     * @param string $dentryId
     * @param array $body
     * @return mixed
     */
    public static function move(string $unionId, string $spaceId,string $dentryId, array $body)
    {
        $uri = Url::$api['storage'] . "/spaces/{$spaceId}/dentries/{$dentryId}/move";

        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::post($uri, $body);
    }
    /**
     * 批量移动文件或文件夹
     *
     * @param string $unionId
     * @param string $spaceId
     * @param array $body
     * @return mixed
     */
    public static function batchMove(string $unionId, string $spaceId, array $body)
    {
        $uri = Url::$api['storage'] . "/spaces/{$spaceId}/dentries/batchMove";

        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::post($uri, $body);
    }
    /**
     * 重命名文件或文件夹
     *
     * @param string $unionId
     * @param string $spaceId
     * @param string $dentryId
     * @param array $body
     * @return mixed
     */
    public static function rename(string $unionId, string $spaceId,string $dentryId, array $body)
    {
        $uri = Url::$api['storage'] . "/spaces/{$spaceId}/dentries/{$dentryId}/rename";

        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::post($uri, $body);
    }
    /**
     * 删除文件或文件夹
     *
     * @param string $spaceId
     * @param string $dentryId
     * @param array $params
     * @return mixed
     */
    public static function toRecycleBin(string $spaceId,string $dentryId, array $params)
    {
        $uri = Url::$api['storage'] . "/spaces/{$spaceId}/dentries/{$dentryId}/toRecycleBin";
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::delete($uri);
    }
    /**
     * 批量删除文件或文件夹
     *
     * @param string $unionId
     * @param string $spaceId
     * @param array $body
     * @return mixed
     */
    public static function batchRemove(string $unionId,string $spaceId,array $body)
    {
        $uri = Url::$api['storage'] . "/spaces/{$spaceId}/dentries/batchRemove";
        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::post($uri,$body);
    }
    /**
     * 恢复文件历史版本
     *
     * @param string $unionId
     * @param string $spaceId
     * @param string $dentryId
     * @param string $version
     * @param array $body
     * @return mixed
     */
    public static function revert(string $unionId,string $spaceId,string $dentryId,string $version,array $body)
    {
        $uri = Url::$api['storage'] . "/spaces/{$spaceId}/dentries/{$dentryId}/versions/{$version}/revert";
        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::post($uri,$body);
    }
    /**
     * 获取文件版本列表
     *
     * @param string $spaceId
     * @param string $dentryId
     * @param array $params
     * @return mixed
     */
    public static function versions(string $spaceId,string $dentryId,array $params)
    {
        $uri = Url::$api['storage'] . "/spaces/{$spaceId}/dentries/{$dentryId}/versions";
       
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::get($uri);
    }
    /**
     * 获取文件或文件夹信息
     *
     * @param string $unionId
     * @param string $spaceId
     * @param string $dentryId
     * @param array $body
     * @return mixed
     */
    public static function query(string $unionId,string $spaceId,string $dentryId,array $body)
    {
        $uri = Url::$api['storage'] . "/spaces/{$spaceId}/dentries/{$dentryId}/query";
        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::post($uri,$body);
    }
    /**
     * 批量获取文件或文件夹信息
     *
     * @param string $unionId
     * @param string $spaceId
     * @param array $body
     * @return mixed
     */
    public static function getInfos(string $unionId,string $spaceId,array $body)
    {
        $uri = Url::$api['storage'] . "/spaces/{$spaceId}/dentries/query";
        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::post($uri,$body);
    }
    /**
     * 获取空间下所有文件或文件夹列表
     *
     * @param string $unionId
     * @param string $spaceId
     * @param array $body
     * @return mixed
     */
    public static function listAll(string $unionId,string $spaceId,array $body)
    {
        $uri = Url::$api['storage'] . "/spaces/{$spaceId}/dentries/listAll";
        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::post($uri,$body);
    }
    /**
     * 更新文件或文件夹的应用属性
     *
     * @param string $unionId
     * @param string $spaceId
     * @param string $dentryId
     * @param array $body
     * @return mixed
     */
    public static function appProperties(string $unionId,string $spaceId,string $dentryId,array $body)
    {
        $uri = Url::$api['storage'] . "/spaces/{$spaceId}/dentries/{$dentryId}/appProperties";
        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::put($uri,$body);
    }
    /**
     * 删除文件或文件夹的应用属性
     *
     * @param string $unionId
     * @param string $spaceId
     * @param string $dentryId
     * @param array $body
     * @return mixed
     */
    public static function propertiesRemove(string $unionId,string $spaceId,string $dentryId,array $body)
    {
        $uri = Url::$api['storage'] . "/spaces/{$spaceId}/dentries/{$dentryId}/appProperties/remove";
        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::post($uri,$body);
    }
    /**
     * 获取文件预览或编辑信息
     *
     * @param string $unionId
     * @param string $spaceId
     * @param string $dentryId
     * @param array $body
     * @return mixed
     */
    public static function openInfosQuery(string $unionId,string $spaceId,string $dentryId,array $body)
    {
        $uri = Url::$api['storage'] . "/spaces/{$spaceId}/dentries/{$dentryId}/openInfos/query";
        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::post($uri,$body);
    }
    /**
     * 批量获取文件缩略图
     *
     * @param string $unionId
     * @param string $spaceId
     * @param array $body
     * @return mixed
     */
    public static function thumbnailsQuery(string $unionId,string $spaceId,array $body)
    {
        $uri = Url::$api['storage'] . "/spaces/{$spaceId}/thumbnails/query";
        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::post($uri,$body);
    }
}
