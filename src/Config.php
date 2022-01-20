<?php

declare(strict_types=1);

namespace SimpleDingTalk;


class Config
{

    public static $app_type = 'miniprogram_app';
    public static $robot_type = 'robot1';
    public static $corp_id = '';
    public static $app_info = [

            'miniprogram_app' => [
                'info' => [
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
                'login_info' => [
                    'autherize' => [
                        'redirect_uri' => ''
                    ]
                ],
                'v2' => [
                    'access_token' => [
                        'expires' => 0,
                        'file_path' => ''
                    ],

                ],
                'userAccessToken' => [
                    'expires' => 0,
                    'file_path' => ''
                ]
            ],
            'micro_app' => [
                'info' => [
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
                'login_info' => [
                    'autherize' => [
                        'redirect_uri' => ''
                    ]
                ],
                'v2' => [
                    'access_token' => [
                        'expires' => 0,
                        'file_path' => ''
                    ],
                ],
                'userAccessToken' => [
                    'expires' => 0,
                    'file_path' => ''
                ]
            ]
    ];
    public static $robot_info = [
        'robot1' => [
            'info' => [
                'AGENT_ID' => 0,
                'APP_KEY' => '',
                'APP_SECRET' => '',
                'access_token' => '',
                'SEC' => ''
            ],
            'access_token' => [
                'expires' => 0,
                'file_path' => ''
            ]
        ],
        'robot2' => [
            'info' => [
                'AGENT_ID' => 0,
                'APP_KEY' => '',
                'APP_SECRET' => '',
                'access_token' => '',
                'SEC' => ''
            ],
            'access_token' => [
                'expires' => 0,
                'file_path' => ''
            ]
        ],
    ];
    public static function setAppType(string $appName)
    {
        self::$app_type = $appName;
        return new Self;
    }
    public static function setRobotType(string $robotType)
    {
        self::$robot_type = $robotType;
        return new Self;
    }
    public static function setCorpId(string $corp_id)
    {
        self::$corp_id = $corp_id;
        return new Self;
    }
    public static function setApp(array $apps)
    {
        self::$app_info = $apps;
        return new Self;
    }
    public static function setRobot(array $robots)
    {
        self::$robot_info = $robots;
        return new Self;
    }
    public static function getApp(){
        return self::$app_info[self::$app_type];
    }
    public static function getRobot(){
        return self::$robot_info[self::$robot_type];
    }

    public static function getCorpId(){
        return self::$corp_id;
    }
}
