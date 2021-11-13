<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Authentication;
use SimpleDingTalk\v2\apiRequest;
use SimpleDingTalk\v2\Url;
use SimpleDingTalk\Config;
/**
 * 文件管理
 */
class Authorize
{
    private static $uri='https://login.dingtalk.com/oauth2/auth';
   

  

    public static function assemble_url(){
     
        $app=Config::$app_info['app'][Config::$app_type];
        $redirect_uri=urlencode($app['login_info']['autherize']['redirect_uri']);
        $params=[
            'redirect_uri'=>$redirect_uri,
            'response_type'=>'code',
            'client_id'=>$app['app_info']['APP_KEY'],
            'scope'=>'openid',
            'state'=>'ok',
            'prompt'=>'consent'
        ];
        $uri=self::$uri;
        return apiRequest::joinParams($uri,$params);

    }
}