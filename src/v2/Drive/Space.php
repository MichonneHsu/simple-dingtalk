<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Drive;


/**
 * 钉盘
 */
class Space
{
    /**
     * 新建空间
     *
     * @param string $unionId
     * @param string $name
     * @return mixed
     */
    public static function create(string $unionId, string $name)
    {
        $uri = Url::$api['drive'];

        $body = [
            'name' => $name,
            'unionId' => $unionId
        ];
        return apiRequest::post($uri, $body);
    }
    /**
     * 删除空间
     *
     * @param string $unionId
     * @param string $spaceId
     * @return mixed
     */
    public static function remove(string $unionId, string $spaceId)
    {
        $uri = Url::$api['drive'] . $spaceId;

        $params = [
            'unionId' => $unionId
        ];
        $uri = apiRequest::joinParams($uri, $params);
        return apiRequest::delete($uri);
    }

    /**
     * 获取空间列表
     *
     * @param string $unionId
     * @param string $spaceType
     * @param string $maxResults
     * @param string $nextToken
     * @return mixed
     */
    public static function get_list(string $unionId, string $spaceType, string $maxResults, string $nextToken='')
    {
        $uri = Url::$api['drive'];

        $params = [
            'unionId' => $unionId,
            'spaceType' => $spaceType,
            'maxResults'=>$maxResults,
            'nextToken'=>$nextToken
        ];
        $uri = apiRequest::joinParams($uri, $params);
        return apiRequest::get($uri);
    }
    /**
     * 获取空间信息
     *
     * @param string $unionId
     * @param string $spaceId
     * @return mixed
     */
    public static function get_info(string $unionId, string $spaceId)
    {
        $uri = Url::$api['drive'].$spaceId;

        $params = [
            'unionId' => $unionId
        ];
        $uri = apiRequest::joinParams($uri, $params);
        return apiRequest::get($uri);
    }




}
