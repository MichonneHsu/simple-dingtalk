<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;



class Url
{
    public static $api = [
        'domain' => 'https://api.dingtalk.com',
        'gettoken' => '/v1.0/oauth2/accessToken',
        'getUserToken' => '/v1.0/oauth2/userAccessToken',
        'todo' => '/v1.0/todo/users',
        'calendar' => '/v1.0/calendar/users',
        'drive' => '/v1.0/drive/spaces',
        'serviceGroup' => '/v1.0/serviceGroup',
        'badge' => '/v1.0/badge',
        'attendance' => '/v1.0/attendance',
        'storage' => [
            'v1' => '/v1.0/storage',
            'v2' => '/v2.0/storage'

        ],
        'convFile' => '/v1.0/convFile',
        'robot' => [
            'oToMessages_batchSend' => '/v1.0/robot/oToMessages/batchSend',
            'interactiveCards_send' => '/v1.0/im/interactiveCards/send',
            'interactiveStandarCard_send' => '/v1.0/im/v1.0/robot/interactiveCards/send',
            'interactiveStandarCard_update' => '/v1.0/im/robots/interactiveCards',
            'card' => '/v1.0/im/interactiveCards',
            'scencegroup_chat' => '/topapi/im/chat/scencegroup/message/send_v2',
            'callback_register' => '/topapi/im/chat/scencegroup/interactivecard/callback/register',
            'send_msg' => '/robot/send',
            'batchRecall' => '/v1.0/robot/otoMessages/batchRecall',
            'sendGroupMessages' => '/v1.0/robot/groupMessages/send',
            'readStatus' => '/v1.0/robot/oToMessages/readStatus',
            'recallGroupMessages' => '/v1.0/robot/groupMessages/recall',
            'queryGroupMessages' => '/v1.0/robot/groupMessages/query',
            'card_hanger' => '/v1.0/im/interactiveCards/instances',
            'card_hanger_open' => '/v1.0/im/topBoxes/open',
            'card_hanger_close' => '/v1.0/im/topBoxes/close'
        ],
        'honor' => [
            'getLists' => '/v1.0/orgCulture/organizations/honors',
            'give' => '/v1.0/orgCulture/honors',
            'query' => '/v1.0/orgCulture/honors/users'
        ],
        'contact' => '/v1.0/contact',
        'videoConferences' => '/v1.0/conference/videoConferences',
        'document' => [
            'workspaces' => '/v1.0/doc/workspaces',
            'templates' => '/v1.0/doc/templates',
            'workbooks'=>'/v1.0/doc/workbooks'
        ],
        'oa' => [
            'workflow' => '/v1.0/workflow',
            'processCentres' => '/v1.0/workflow/processCentres'
        ],
        'group' => [
            'convertToOpenConversationId' => '/v1.0/im/chat'
        ],
        'teambition' => [
            'project' => '/v1.0/project'
        ],
        'interactiveCard' => [
            'v1' => [
                'instances' => '/v1.0/card/instances',
                'deliver' => '/v1.0/card/instances/deliver',
                'createAndDeliver' => '/v1.0/card/instances/createAndDeliver',
                'register' => '/v1.0/card/callbacks/register',
                'spaces' => '/v1.0/card/instances/spaces'
            ]
        ],
        'register'=>[
            'v1'=>[
                'gateway'=>'/v1.0/gateway/connections/open'
            ]
        ]

    ];
}
