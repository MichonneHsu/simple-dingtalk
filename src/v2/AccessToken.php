<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;
use SimpleDingTalk\Config;
use Exception;

class AccessToken
{

   
    public static function getToken(): string
    {
        $at=Config::$app_info['app'][Config::$app_type]['v2']['access_token'];
        $file_path=$at['file_path'];
        if (!file_exists($file_path)) {
            throw new Exception($file_path . ' 文件不存在');
        }
      
        $json = file_get_contents($file_path);
        if (empty($json)) {

            self::generateToken();
           
        } else {
            $token = json_decode($json, true);
            if (($token['expireIn'] - $at['expires']) < time()) {
                self::generateToken();

              
            }
        }

        $json = file_get_contents($file_path);

        $token = json_decode($json, true);
        
        return  $token['accessToken'];
    }
    public static function generateToken()
    {

        $app_info= Config::$app_info['app'][Config::$app_type];
        $appkey =$app_info['APP_KEY'];
        $appSecret = $app_info['APP_SECRET'];
        $uri = Url::$api['gettoken'];
        $body = [
            'appKey' => $appkey,
            'appSecret' => $appSecret
        ];
       
        $has_headers=false;
        $res = apiRequest::post($uri, $body,$has_headers);
        $token = json_decode($res, true);
        $expires_in = $token['expireIn'];
        $token['expireIn'] = $expires_in + time();
        $filename = $app_info['v2']['access_token']['file_path'];
        $data = json_encode($token);
        file_put_contents($filename, $data);
    }
}
