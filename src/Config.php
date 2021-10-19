<?php declare(strict_types=1);
namespace SimpleDingTalk;


class Config{
    
    public static $app_info=[
        'CORP_ID'=>'',
        'AGENT_ID'=>'',
        'APP_KEY'=>'',
        'APP_SECRET'=>''
    ];
    public static $access_token=[
        'expires'=>0,
        'file_path'=>''
    ];
    public static $callback_info=[
        'aes_key'=>'',
        'token'=>''
    ];
} 