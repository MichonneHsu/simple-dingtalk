<?php declare(strict_types=1);
namespace SimpleDingtalk;


class Config{
    public static $api=[
        'domain' => 'https://oapi.dingtalk.com',
        'gettoken' => '/gettoken',
        'getuserinfo'=>'/user/getuserinfo'
    ];
    public static $info=[
        'expires'=>0,
        'access_token_file_path'=>'',
        'APP_KEY'=>'',
        'APP_SECRET'=>''
    ];
} 