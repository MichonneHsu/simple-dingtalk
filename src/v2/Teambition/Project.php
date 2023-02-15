<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Teambition;

use SimpleDingTalk\v2\ApiRequest;
use SimpleDingTalk\v2\Url;
class Project
{
    /**
     * 搜索企业项目模板
     *
     * @param string $userId
     * @param string $keyword
     * @return void
     */
    public static function searchTemplates(string $userId,string $keyword){
        $uri=Url::$api['teambition']['project']."/organizations/users/{$userId}/templates?keyword={$keyword}";
        return ApiRequest::get($uri);
    }
    /**
     * 根据项目模板创建项目
     *
     * @param string $userId
     * @param array $body
     * @return void
     */
    public static function create(string $userId,array $body){
        $uri=Url::$api['teambition']['project']."/users/{$userId}/templates/projects";
        return ApiRequest::post($uri,$body);
    }
    /**
     * 查询员工可见的项目分组
     *
     * @param string $userId
     * @param array $query
     * @return void
     */
    public static function queryViewerGroup(string $userId,array $query){
        $uri=Url::$api['teambition']['project']."/users/{$userId}/templates/projects";
        $uri=ApiRequest::joinParams($uri,$query);
        return ApiRequest::get($uri);
    }
    /**
     * 更新项目所在的分组
     *
     * @param string $userId
     * @param string $projectId
     * @param array $body
     * @return void
     */
    public static function updateGroup(string $userId,string $projectId,array $body){
        $uri=Url::$api['teambition']['project']."/users/{$userId}/projects/{$projectId}/groups";
       
        return ApiRequest::put($uri,$body);
    }
    /**
     * 添加项目成员
     *
     * @param string $userId
     * @param string $projectId
     * @param array $body
     * @return void
     */
    public static function addMembers(string $userId,string $projectId,array $body){
        $uri=Url::$api['teambition']['project']."/users/{$userId}/projects/{$projectId}/members";
       
        return ApiRequest::post($uri,$body);
    }

}