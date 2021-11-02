<?php

declare(strict_types=1);

namespace SimpleDingTalk;


class Config
{

    public static $app_type = 'miniprogram_app';
    public static $robot_type = 'robot1';
    public static $app_info = [
        'CORP_ID' => '',
        'app' => [
            'miniprogram_app' => [
                'app_info' => [
                    'AGENT_ID' => '',
                    'APP_KEY' => '',
                    'APP_SECRET' => ''
                ],
                'access_token' => [
                    'expires' => 0,
                    'file_path' => ''
                ],
                'callback_info' => [
                    'aes_key' => '',
                    'token' => ''
                ],
                'scan_info' => [
                    'redirect_uri' => ''
                ],
                'v2' => [
                    'access_token' => [
                        'expires' => 0,
                        'file_path' => ''
                    ],
                ]
            ],
            'micro_app' => [
                'app_info' => [
                    'AGENT_ID' => '',
                    'APP_KEY' => '',
                    'APP_SECRET' => ''
                ],
                'access_token' => [
                    'expires' => 0,
                    'file_path' => ''
                ],
                'callback_info' => [
                    'aes_key' => '',
                    'token' => ''
                ],
                'page' => [
                    'app' => '',
                    'pc' => '',
                    'management' => ''
                ],
                'scan_info' => [
                    'redirect_uri' => ''
                ],
                'v2' => [
                    'access_token' => [
                        'expires' => 0,
                        'file_path' => ''
                    ],
                ]
            ],
        ],
        'robot'=>[
            'robot1' => [
                'info' => [
                    'AGENT_ID' => 0,
                    'APP_KEY' => '',
                    'APP_SECRET' => ''
                ],
                
            ],
            'robot2' => [
                'info' => [
                    'AGENT_ID' => 0,
                    'APP_KEY' => '',
                    'APP_SECRET' => ''
                ],
                
            ],
        ]



    ];
    public static $scan_info = [
        'redirect_url' => ''
    ];
}
