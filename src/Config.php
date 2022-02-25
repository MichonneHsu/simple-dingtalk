<?php

declare(strict_types=1);

namespace SimpleDingTalk;


class Config
{

    private static $app_type = 'miniprogram_app';
    private static $robot_type = 'robot1';
    private static $corp_id = '';
    private static $app_info = [

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
                    'authorize' => [
                        'redirect_uri' => '',
                        'dingtalk_login_uri' => ''
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
                    'authorize' => [
                        'redirect_uri' => '',
                        'dingtalk_login_uri'=>''
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
    private static $robot_info = [
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
    /**
     * 设选择当前的应用
     *
     * @param array $robots
     * @return $this
     */
    public static function setAppType(string $appName)
    {
        self::$app_type = $appName;
        return new Self;
    }
    /**
     * 选择当前的机器人
     *
     * @param array $robots
     * @return $this
     */
    public static function setRobotType(string $robotType)
    {
        self::$robot_type = $robotType;
        return new Self;
    }
    /**
     * 设置企业ID
     *
     * @param array $robots
     * @return $this
     */
    public static function setCorpId(string $corp_id)
    {
        self::$corp_id = $corp_id;
        return new Self;
    }
    /**
     * 设置应用信息
     *
     * @param array $robots
     * @return $this
     */
    public static function setApp(array $apps)
    {
        self::$app_info = $apps;
        return new Self;
    }
    /**
     * 设置机器人应用信息
     *
     * @param array $robots
     * @return $this
     */
    public static function setRobot(array $robots)
    {
        self::$robot_info = $robots;
        return new Self;
    }
    /**
     * 获取当前应用配置信息
     *
     * @return array
     */
    public static function getApp(){
        return self::$app_info[self::$app_type];
    }
     /**
     * 获取当前机器人应用配置信息
     *
     * @return array
     */
    public static function getRobot(){
        return self::$robot_info[self::$robot_type];
    }
    /**
     * 获取企业ID
     *
     * @return string
     */
    public static function getCorpId(){
        return self::$corp_id;
    }
}
