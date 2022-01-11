<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Authentication;
use SimpleDingTalk\v2\ApiRequest;
use SimpleDingTalk\v2\Url;
use SimpleDingTalk\Config;
/**
 * 统一授权登录第三方网站
 */
class Authorize
{
    private static $uri='https://login.dingtalk.com/oauth2/auth';
   

  
    /**
     * 获取构造页面地址
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
        $uri=self::$uri;
        return ApiRequest::joinParams($uri,$params);

    }
}