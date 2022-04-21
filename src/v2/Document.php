<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;


/**
 * 文档
 */
class Document
{
    /**
     * 新建团队空间
     *
     * @param string $operatorId
     * @param string $name
     * @param string $description
     * @return mixed
     */
    public static function create_space(string $operatorId, string $name, string $description)
    {


        $uri = Url::$api['document']['workspaces'];
        $body = [
            'operatorId' => $operatorId,
            'name' => $name,
            'description' => $description
        ];

        return ApiRequest::post($uri, $body);
    }
    /**
     * 添加团队空间成员
     *
     * @param string $operatorId
     * @param string $workspaceId
     * @param array $members
     * @return mixed
     */
    public static function add_space_members(string $operatorId, string $workspaceId, array $members)
    {


        $uri = Url::$api['document']['workspaces'] . "/{$workspaceId}/members";
        $body = [
            'operatorId' => $operatorId,
            'members' => $members

        ];

        return ApiRequest::post($uri, $body);
    }
    /**
     * 查询团队空间信息
     *
     * @param string $workspaceId
     * @return mixed
     */
    public static function get_space(string $workspaceId)
    {
        $uri = Url::$api['document']['workspaces'] . "/{$workspaceId}";
        return ApiRequest::get($uri);
    }
    /**
     * 更新团队空间成员权限
     *
     * @param string $operatorId
     * @param string $workspaceId
     * @param array $members
     * @return mixed
     */
    public static function update_space_members(string $operatorId, string $workspaceId, array $members)
    {


        $uri = Url::$api['document']['workspaces'] . "/{$workspaceId}/members";
        $body = [
            'operatorId' => $operatorId,
            'members' => $members

        ];

        return ApiRequest::put($uri, $body);
    }
    /**
     * 删除团队空间成员
     *
     * @param string $operatorId
     * @param string $workspaceId
     * @param array $members
     * @return mixed
     */
    public static function remove_space_members(string $operatorId, string $workspaceId, array $members)
    {


        $uri = Url::$api['document']['workspaces'] . "/{$workspaceId}/members/remove";
        $body = [
            'operatorId' => $operatorId,
            'members' => $members
        ];

        return ApiRequest::post($uri, $body);
    }
    /**
     * 创建团队空间文档
     *
     * @param string $operatorId
     * @param string $workspaceId
     * @param string $name
     * @param string $docType
     * @return mixed
     */
    public static function create_docs(string $operatorId, string $workspaceId, string $name,string $docType)
    {


        $uri = Url::$api['document']['workspaces'] . "/{$workspaceId}/docs";
        $body = [
            'operatorId' => $operatorId,
            'name' => $name,
            'docType'=>$docType
        ];

        return ApiRequest::post($uri, $body);
    }
    /**
     * 添加团队空间文档成员
     *
     * @param string $operatorId
     * @param string $workspaceId
     * @param string $nodeId
     * @param array $members
     * @return mixed
     */
    public static function add_docs_members(string $operatorId, string $workspaceId,string $nodeId, array $members)
    {


        $uri = Url::$api['document']['workspaces'] . "/{$workspaceId}/docs/{$nodeId}/members";
        $body = [
            'operatorId' => $operatorId,
            'members'=>$members
        ];

        return ApiRequest::post($uri, $body);
    }
    /**
     * 修改团队空间文档成员权限
     *
     * @param string $operatorId
     * @param string $workspaceId
     * @param string $nodeId
     * @param array $members
     * @return mixed
     */
    public static function update_docs_members(string $operatorId, string $workspaceId,string $nodeId, array $members)
    {


        $uri = Url::$api['document']['workspaces'] . "/{$workspaceId}/docs/{$nodeId}/members";
        $body = [
            'operatorId' => $operatorId,
            'members'=>$members
        ];

        return ApiRequest::put($uri, $body);
    }
    /**
     * 删除团队空间文档成员
     *
     * @param string $operatorId
     * @param string $workspaceId
     * @param string $nodeId
     * @param array $members
     * @return mixed
     */
    public static function remove_docs_members(string $operatorId, string $workspaceId,string $nodeId, array $members)
    {


        $uri = Url::$api['document']['workspaces'] . "/{$workspaceId}/docs/{$nodeId}/members/remove";
        $body = [
            'operatorId' => $operatorId,
            'members'=>$members
        ];

        return ApiRequest::post($uri, $body);
    }
    /**
     * 查询文档模版
     *
     * @param string $operatorId
     * @param string $templateType
     * @param string $workspaceId
     * @param string $nextToken
     * @param integer $maxResults
     * @return mixed
     */
    public static function query_docs_templates(string $operatorId, string $templateType,string $workspaceId,string $nextToken,int $maxResults=10)
    {


        $uri = Url::$api['document']['templates'] . "/operatorId={$operatorId}&templateType={$templateType}&workspaceId={$workspaceId}&nextToken={$nextToken}&maxResults={$maxResults}";
       

        return ApiRequest::get($uri);
    }

    
}
