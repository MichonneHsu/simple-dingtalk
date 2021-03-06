<?php

declare(strict_types=1);

namespace SimpleDingTalk;

use Exception;

class AccessToken
{



    public static function getToken(): string
    {
        $app = Config::getApp();
        $file_path = $app['access_token']['file_path'];
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
            if (($token['expires_in'] - $app['access_token']['expires']) < time()) {
                self::generateToken();
            }
        }

        $json = file_get_contents($file_path);

        $token = json_decode($json, true);

        return  $token['access_token'];
    }
    public static function generateToken()
    {

        $app = Config::getApp();
        $appkey = $app['info']['APP_KEY'];
        $appSecret = $app['info']['APP_SECRET'];
        $uri = Url::$api['gettoken'];
        $query = [
            'appkey' => $appkey,
            'appsecret' => $appSecret
        ];
        $has_token = false;
        $json = ApiRequest::get($uri, $query, $has_token);
        $token = json_decode($json, true);
        $expires_in = $token['expires_in'];
        $token['expires_in'] = $expires_in + time();
        $filename = $app['access_token']['file_path'];
        $data = json_encode($token);
        file_put_contents($filename, $data);
    }
}
