<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Authentication;
use SimpleDingTalk\v2\ApiRequest;
use SimpleDingTalk\v2\Url;
use SimpleDingTalk\Config;
use SimpleDingTalk\util\Random;

/**
 * 统一授权登录第三方网站
 */
class Authorize
{
    private static $uris=[
        'assemble_url'=>'https://login.dingtalk.com/oauth2/auth',
        'dingtalk_login_uri'=>'https://oapi.dingtalk.com/connect/oauth2/sns_authorize',
    ];
 
    /**
     * 统一授权登录第三方网站
     *
     * @return string
     */
    public static function assemble_url(){
     
        $app=Config::getApp();
        $redirect_uri=$app['login_info']['authorize']['redirect_uri'];
        $params=[
            'redirect_uri'=>$redirect_uri,
            'response_type'=>'code',
            'client_id'=>$app['info']['APP_KEY'],
            'scope'=>'openid',
            'state'=>Random::alpabets()->generate(),
            'prompt'=>'consent'
        ];
        $uri=self::$uris['assemble_url'];
        return ApiRequest::joinParams($uri,$params);

    }
    /**
     * 钉钉内免登页面地址
     *
     * @return string
     */
    public static function dingtalk_login_url(){
      
        $app=Config::getApp();
        $redirect_uri=$app['login_info']['authorize']['dingtalk_login_uri'];
        $params=[
            'redirect_uri'=>$redirect_uri,
           'appid'=>$app['info']['APP_KEY'],
           'response_type'=>'code',
           'scope'=>'snsapi_auth',
           'state'=>Random::alpabets()->generate()
        ];
        $uri=self::$uris['dingtalk_login_uri'];
        return ApiRequest::joinParams($uri,$params);
    }
}