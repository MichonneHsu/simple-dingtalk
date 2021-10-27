<?php

declare(strict_types=1);

namespace SimpleDingTalk;

use Exception;

class JsapiTicket
{

   
    public static function getToken(): string
    {
        $app=Config::$app_info['app'][Config::$app_type];
        $file_path=$app['access_token']['file_path'];
        if (!file_exists($file_path)) {
            throw new Exception($file_path . ' 文件不存在');
        }
      
        $json = file_get_contents($file_path);
        if (empty($json)) {

            self::generateToken();
           
        } else {
            $token = json_decode($json, true);
            if (($token['expires_in'] - $app['access_token']['expires']) < time()) {
                self::generateToken();

              
            }
        }

        $json = file_get_contents($file_path);

        $token = json_decode($json, true);
        
        return  $token['ticket'];
    }
    public static function generateToken()
    {

      
      
        $uri = Url::$api['get_jsapi_ticket'];
        $query = [
            'access_token' => AccessToken::getToken(),
        ];
        $json = apiRequest::get($uri, $query);
        $token = json_decode($json, true);
        $expires_in = $token['expires_in'];
        $token['expires_in'] = $expires_in + time();
        $filename = Config::$app_info['app'][Config::$app_type]['access_token']['file_path'];
        $data = json_encode($token);
        file_put_contents($filename, $data);
    }
}
