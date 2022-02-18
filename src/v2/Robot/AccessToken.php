<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Robot;
use SimpleDingTalk\Config;
use Exception;
use SimpleDingTalk\v2\Url;
class AccessToken
{

   
    public static function getToken(): string
    {
        $robot=Config::getRobot();
        $file_path=$robot['access_token']['file_path'];
        $file_info=pathinfo($file_path);
        $file_path_info=$file_info['dirname'].'/'.$file_info['basename'];
        if (!file_exists($file_path)) {
            throw new Exception($file_path_info . ' 文件不存在');
        }
      
        $json = file_get_contents($file_path);
        if (empty($json)) {

            self::generateToken();
           
        } else {
            $token = json_decode($json, true);
            if (($token['expireIn'] - $robot['access_token']['expires']) < time()) {
                self::generateToken();

              
            }
        }

        $json = file_get_contents($file_path);

        $token = json_decode($json, true);
        
        return  $token['accessToken'];
    }
    public static function generateToken()
    {

        $app= Config::getRobot();
        $appkey =$app['info']['APP_KEY'];
        $appSecret = $app['info']['APP_SECRET'];
        $uri = Url::$api['gettoken'];
        $body = [
            'appKey' => $appkey,
            'appSecret' => $appSecret
        ];
       
        $has_token=false;
        $res = ApiRequest::post($uri, $body,$has_token);
        $token = json_decode($res, true);
        $expires_in = $token['expireIn'];
        $token['expireIn'] = $expires_in + time();
        $filename = $app['access_token']['file_path'];
        $data = json_encode($token);
        file_put_contents($filename, $data);
    }
}
