<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;

use SimpleDingTalk\Config;
use Exception;

class AccessToken
{


    public static function getToken(): string
    {
        $at = Config::$app_info['app'][Config::$app_type]['v2']['access_token'];
        $file_path = $at['file_path'];
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

        $app = Config::$app_info['app'][Config::$app_type];
        $appkey = $app['app_info']['APP_KEY'];
        $appSecret = $app['app_info']['APP_SECRET'];
        $uri = Url::$api['gettoken'];
        $body = [
            'appKey' => $appkey,
            'appSecret' => $appSecret
        ];

        $has_token = false;
        $res = apiRequest::post($uri, $body, $has_token);
        $token = json_decode($res, true);
        $expires_in = $token['expireIn'];
        $token['expireIn'] = $expires_in + time();
        $filename = $app['v2']['access_token']['file_path'];
        $data = json_encode($token);
        file_put_contents($filename, $data);
    }
    
    
    public static function generateUserToken(string $grantType, string $code, string $refreshToken = '')
    {
        $uri = Url::$api['getUserToken'];;
        $app = Config::$app_info['app'][Config::$app_type];
        $appkey = $app['app_info']['APP_KEY'];
        $appSecret = $app['app_info']['APP_SECRET'];
        $body = [
            'clientId' => $appkey,
            'clientSecret' => $appSecret,
            'grantType' => $grantType,
            'code' => $code,
            'refreshToken' => $refreshToken
        ];
        $has_token = false;
        $res=apiRequest::post($uri, $body, $has_token);
        
        $filename=$app['userAccessToken']['file_path'];
        $token = json_decode($res, true);
        $expires_in = $token['expireIn'];
        $token['expireIn'] = $expires_in + time();
        $data = json_encode($token);
        file_put_contents($filename,$data);
    }

    public static function getUserToken(string $grantType, string $code, string $refreshToken = ''){
        $at = Config::$app_info['app'][Config::$app_type]['userAccessToken'];
        $file_path = $at['file_path'];
        if (!file_exists($file_path)) {
            throw new Exception($file_path . ' 文件不存在');
        }

        $json = file_get_contents($file_path);
        if (empty($json)) {

            self::generateUserToken($grantType,$code,$refreshToken);
        } else {
            $token = json_decode($json, true);
            if (($token['expireIn'] - $at['expires']) < time()) {
                self::generateUserToken($grantType,$code,$refreshToken);
            }
        }

        $json = file_get_contents($file_path);

        $token = json_decode($json, true);

        return  $token['accessToken'];
    }
}
