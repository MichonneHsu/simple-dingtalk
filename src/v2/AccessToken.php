<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;

use SimpleDingTalk\Config;
use Exception;

class AccessToken
{

    public static $grantType = '';
    public static $code = '';
    public static $refreshToken = '';

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


    public static function generateUserToken()
    {
        $uri = Url::$api['getUserToken'];;
        $app = Config::$app_info['app'][Config::$app_type];
        $body = [
            'clientId' => $app['app_info']['APP_KEY'],
            'clientSecret' => $app['app_info']['APP_SECRET'],
            'grantType' => self::$grantType,
            'code' =>  self::$code,
            'refreshToken' =>  self::$refreshToken
        ];
        $has_token = false;
        $res = apiRequest::post($uri, $body, $has_token);
        $token = json_decode($res, true);
        $expires_in = $token['expireIn'];
        $token['expireIn'] = $expires_in + time();

        return $token;
    }

    public static function setUserToken(string $unionId)
    {

        $at = Config::$app_info['app'][Config::$app_type]['userAccessToken'];
        $file_path = $at['file_path'];

        $data = [];

        if (!file_exists($file_path)) {
            throw new Exception($file_path . ' 文件不存在');
        }
        $file_contents = file_get_contents($file_path);
        if ($unionId == 'me') {
            $userinfo = self::getUserInfo($unionId);

            $key = $userinfo['user_info']['unionId'];
            if (empty($file_contents) || array_key_exists($key, $userinfo) <> true || json_decode($file_contents, true)[$unionId]['token_info']['expireIn'] - $at['expires'] < time()) {
                $data[$key] = $userinfo;
            }
            return file_put_contents($file_path, json_encode($data)) <> false ? true : false;
        } else {
            $fc_arr = json_decode($file_contents, true);
            if (empty($file_contents) || array_key_exists($unionId, $fc_arr) <> true || $fc_arr[$unionId]['token_info']['expireIn'] - $at['expires'] < time()) {



                $data[$unionId] = self::getUserInfo($unionId);

                return file_put_contents($file_path, json_encode($data)) <> false ? true : false;
            }
        }
        return true;
    }

    public static function getUserInfo($unionId)
    {
        $uri = Url::$api['contact'] . "users/$unionId";
        $generatedUserToken = AccessToken::generateUserToken();
        $accessToken = $generatedUserToken['accessToken'];
        $res = apiRequest::userGetReq($uri, [], $accessToken);

        return  ['user_info' =>  json_decode($res, true), 'token_info' => $generatedUserToken];
    }
}
