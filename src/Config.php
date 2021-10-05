<?php declare(strict_types=1);
namespace SimpleDingTalk;


class Config{
    public static $api=[
        'domain' => 'https://oapi.dingtalk.com',
        'gettoken' => '/gettoken',
        'getuserinfo'=>'/user/getuserinfo'
    ];
    public static $app_info=[
      
        'APP_KEY'=>'',
        'APP_SECRET'=>''
    ];
    public static $access_token=[
        'expires'=>0,
        'file_path'=>''
    ];
} 