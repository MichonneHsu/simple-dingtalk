<?php declare(strict_types=1);
namespace SimpleDingTalk;


class Config{
    
    public static $app_info=[
        'CORP_ID'=>'',
        'AGENT_ID'=>'',
        'APP_KEY'=>'',
        'APP_SECRET'=>''
    ];
    public static $miniprogram_app=[
        'expires'=>0,
        'file_path'=>''
    ];
    public static $micro_app=[
        'expires'=>0,
        'file_path'=>'',
        'page'=>[
            'app'=>'',
            'pc'=>'',
            'management'=>''
        ]
    ];
    public static $callback_info=[
        'aes_key'=>'',
        'token'=>''
    ];
} 