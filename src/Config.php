<?php declare(strict_types=1);
namespace SimpleDingtalk;


final class Config{
    public static $api=[
        'domain' => 'https://oapi.dingtalk.com',
        'gettoken' => '/gettoken',
        'getuserinfo'=>'/user/getuserinfo'
    ];
    const expires=0;
    const access_token_file_path='';
    const APP_KEY='';
    const APP_SECRET='';
} 