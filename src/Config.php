<?php declare(strict_types=1);
namespace SimpleDingTalk;


class Config{
    public static $api=[
        'domain' => 'https://oapi.dingtalk.com',
        'gettoken' => '/gettoken',
        'getuserinfo'=>'/user/getuserinfo',
        'createuser'=>'/topapi/v2/user/create',
        'updateuser'=>'/topapi/v2/user/update',
        'deleteuser'=>'/topapi/v2/user/delete'
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