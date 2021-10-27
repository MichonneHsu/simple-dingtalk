<?php

declare(strict_types=1);

namespace SimpleDingTalk;


class Config
{

    public static $app_type = 'miniprogram_app';
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
                ]
            ],
        ],



    ];
}
