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
        $uri = Url::$api['serviceGroup'].'/groups';
        return ApiRequest::post($uri, $body);
    }
    public static function send_messages(array $body)
    {
        $uri = Url::$api['serviceGroup'].'/messages/send';
        return ApiRequest::post($uri, $body);
    }
    public static function query_active_users(string $openConversationId,string $openTeamId='')
    {
        $uri = Url::$api['serviceGroup'].'/groups/queryActiveUsers';
        $params=[
            'openConversationId'=>$openConversationId,
            'openTeamId'=>$openTeamId
        ];
        $uri=ApiRequest::joinParams($uri,$params);
        return ApiRequest::get($uri);
    }
}