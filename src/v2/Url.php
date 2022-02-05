<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;



class Url
{
    public static $api = [
        'domain' => 'https://api.dingtalk.com',
        'gettoken' => '/v1.0/oauth2/accessToken',
        'getUserToken'=>'/v1.0/oauth2/userAccessToken',
        'todo'=>'/v1.0/todo/users',
        'calendar'=>'/v1.0/calendar/users',
        'drive'=>'/v1.0/drive/spaces',
        'serviceGroup'=>'/v1.0/serviceGroup',
        'badge'=>'/v1.0/badge',
        'robot'=>[
            'oToMessages_batchSend'=>'/v1.0/robot/oToMessages/batchSend',
            'interactiveCards_send'=>'/v1.0/im/interactiveCards/send',
            'card'=>'/v1.0/im/interactiveCards',
            'scencegroup_chat'=>'/topapi/im/chat/scencegroup/message/send_v2',
            'callback_register'=>'/topapi/im/chat/scencegroup/interactivecard/callback/register',
            'send_msg'=>'/robot/send',
           
        ],
        'contact'=>'/v1.0/contact',
        'videoConferences'=>'/v1.0/conference/videoConferences',
        'document'=>'/v1.0/doc/workspaces',
        'oa'=>[
            'workflow'=>'/v1.0/workflow/forms'
        ]
        
    ];
    
}
