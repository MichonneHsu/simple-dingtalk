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
     * @return mixed
     */
    public static function assemble_url(){
     
        $app=Config::getApp();
        $redirect_uri=urlencode($app['login_info']['autherize']['redirect_uri']);
        $params=[
            'redirect_uri'=>$redirect_uri,
            'response_type'=>'code',
            'client_id'=>$app['info']['APP_KEY'],
            'scope'=>'openid',
            'state'=>'ok',
            'prompt'=>'consent'
        ];
        $uri=self::$uris['assemble_url'];
        return ApiRequest::joinParams($uri,$params);

    }
    /**
     * 钉钉内免登页面地址
     *
     * @return void
     */
    public static function dingtalk_login_url(){
      
        $app=Config::getApp();
        $redirect_uri=urlencode($app['login_info']['autherize']['dingtalk_login_uri']);
        $params=[
           'appid'=>$app['info']['APP_KEY'],
           'response_type'=>'code',
           'scope'=>'snsapi_auth',
           'state'=>'ok',
           'redirect_uri'=>$redirect_uri
        ];
        $uri=self::$uris['dingtalk_login_uri'];
        return ApiRequest::joinParams($uri,$params);
    }
}