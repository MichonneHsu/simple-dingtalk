<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;



class Url
{
    public static $api = [
        'domain' => 'https://api.dingtalk.com',
        'gettoken' => '/v1.0/oauth2/accessToken',
        'todo'=>'/v1.0/todo/users/',
        'calendar'=>'/v1.0/calendar/users/',
        'drive'=>'/v1.0/drive/spaces/',
        'serviceGroup'=>'/v1.0/serviceGroup/groups',
        'badge'=>'/v1.0/badge',
        'robot'=>[
            'oToMessages_batchSend'=>'/v1.0/robot/oToMessages/batchSend',
            'interactiveCards_send'=>'/v1.0/im/interactiveCards/send'
        ],
        
    ];

    public static function joinParams(string $uri, array $params): string
    {


        $url = $uri . '?' . http_build_query($params);

        return urldecode($url);
    }
}
