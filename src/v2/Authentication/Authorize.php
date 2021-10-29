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
    private  $url='https://login.dingtalk.com/oauth2/auth';
    public $redirect_uri='';

    public function set_redirect_uri(string $uri){
        $this->redirect_uri=$uri;

        return $this;
    }


    public function assemble_url(){
        $redirect_uri=$this->redirect_uri;
        $app_info=Config::$app_info['app'][Config::$app_type];
        $params=[
            'redirect_uri'=>$redirect_uri,
            'response_type'=>'code',
            'client_id'=>$app_info['app_info']['APP_KEY'],
            ''
        ]

    }
}