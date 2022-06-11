<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;


/**
 * 服务群
 */
class ServiceGroup
{
    public static function create(array $body)
    {
        $uri = Url::$api['serviceGroup'] . '/groups';
        return ApiRequest::post($uri, $body);
    }
    public static function send_messages(array $body)
    {
        $uri = Url::$api['serviceGroup'] . '/messages/send';
        return ApiRequest::post($uri, $body);
    }
    public static function query_active_users(string $openConversationId, string $openTeamId = '')
    {
        $uri = Url::$api['serviceGroup'] . '/groups/queryActiveUsers';
        $params = [
            'openConversationId' => $openConversationId,
            'openTeamId' => $openTeamId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::get($uri);
    }
    public static function cloud_groups_upgrade(string $openConversationId, string $ccsInstanceId, string $templateId = '', string $openGroupSetId = '', string $openTeamId = '')
    {
        $uri = Url::$api['serviceGroup'] . '/cloudGroups/upgrade';
        $body = [
            'openConversationId' => $openConversationId,
            'ccsInstanceId' => $ccsInstanceId,
            'templateId' => $templateId,
            'openGroupSetId' => $openGroupSetId,
            'openTeamId' => $openTeamId
        ];
        return ApiRequest::post($uri, $body);
    }
    public static function normal_groups_upgrade(string $openConversationId, string $openGroupSetId = '', string $templateId = '', string $openTeamId = '')
    {
        $uri = Url::$api['serviceGroup'] . '/cloudGroups/upgrade';
        $body = [
            'openConversationId' => $openConversationId,
            'templateId' => $templateId,
            'openGroupSetId' => $openGroupSetId,
            'openTeamId' => $openTeamId
        ];
        return ApiRequest::post($uri, $body);
    }
}
