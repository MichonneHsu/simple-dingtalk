<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Attendance;
use SimpleDingTalk\v2\Url;
use SimpleDingTalk\Config;
use SimpleDingTalk\v2\ApiRequest;
class Group
{
    /**
     * 查询考勤写操作权限
     *
     * @param string $opUserId
     * @param string $category
     * @param string $resourceKey
     * @param array $entityIds
     * @return mixed
     */
    public static function writePermissions(string $opUserId,string $category,string $resourceKey,array $entityIds)
    {

        $uri = Url::$api['attendance'] . '/writePermissions/query';
       
        $params=[
            'opUserId'=>$opUserId,
            'category'=>$category,
            'resourceKey'=>$resourceKey,
            'entityIds'=>$entityIds
        ];
        $uri=ApiRequest::joinParams($uri,$params);
        return ApiRequest::get($uri);
    }
   
}