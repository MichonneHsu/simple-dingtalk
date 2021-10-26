<?php

declare(strict_types=1);

namespace SimpleDingTalk;

use Exception;

class AccessToken
{

   
    public static function getToken(): string
    {
        $at=Config::$miniprogram_app;
        $file_path=$at['file_path'];
        if (!file_exists($file_path)) {
            throw new Exception($file_path . ' 文件不存在');
        }
      
        $json = file_get_contents($file_path);
        if (empty($json)) {

            self::generateToken();
           
        } else {
            $token = json_decode($json, true);
            if (($token['expires_in'] - $at['expires']) < time()) {
                self::generateToken();

              
            }
        }

        $json = file_get_contents($file_path);

        $token = json_decode($json, true);
        
        return  $token['access_token'];
    }
    public static function generateToken()
    {

        $app_info=Config::$app_info;
        $appkey =$app_info['APP_KEY'];
        $appSecret = $app_info['APP_SECRET'];
        $uri = Url::$api['gettoken'];
        $query = [
            'appkey' => $appkey,
            'appsecret' => $appSecret
        ];
        $has_token =false;
        $json = apiRequest::get($uri, $query,$has_token);
        $token = json_decode($json, true);
        $expires_in = $token['expires_in'];
        $token['expires_in'] = $expires_in + time();
        $filename = Config::$miniprogram_app['file_path'];
        $data = json_encode($token);
        file_put_contents($filename, $data);
    }
}
