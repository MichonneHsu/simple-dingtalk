<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;

use SimpleDingTalk\Config;
use Exception;

class AccessToken
{

    private static $grantType = '';
    private static $code = '';
    private static $refreshToken = '';
    private static $token=[];
    private static $userToken=[];
    private static $tokenFromJsonFile=true;
    public static function setGrantType($grantType)
    {
        self::$grantType = $grantType;
        return new Self;
    }
    public static function setCode($code)
    {
        self::$code = $code;
        return new Self;
    }
    public static function setRefreshToken($refreshToken)
    {
        self::$refreshToken = $refreshToken;
        return new Self;
    }
    /**
     * 设置Token是否取自JSON文件
     *
     * @param boolean $fromJsonFile
     * @return void
     */
    public static function setTokenFromJsonFile(bool $fromJsonFile){
        static::$tokenFromJsonFile=$fromJsonFile;
    }

    public static function  getTokenFromJsonFile(){
        return static::$tokenFromJsonFile;
    }
    public static function getGrantType()
    {
        return self::$grantType;
    }
    public static function getCode()
    {
        return self::$code;
    }
    public static function getRefreshToken()
    {
        return self::$refreshToken;
    }
    public static function getToken(): string
    {
        $at = Config::getApp()['v2']['access_token'];
        $getTokenFromJsonFile=static::getTokenFromJsonFile();
        if(true===$getTokenFromJsonFile){
            $file_path = $at['file_path'];
            $file_info = pathinfo($file_path);
            $file_path_info = $file_info['dirname'] . '/' . $file_info['basename'];
            if (!file_exists($file_path)) {
                throw new Exception($file_path_info . ' 文件不存在');
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
        }else{
          
            $userToken=static::$userToken;
            if(!empty($userToken)){
                if (($userToken['expireIn'] - $at['expires']) < time()) {
                    self::generateToken();
                }
                return $userToken['accessToken'];
            }else{
                throw new Exception("Empty Token", 500);
                
            }
           
            
        }
       
    }
    public static function editUserToken(array $token){
        static::$userToken=$token;
    }
    public static function retriveUserToken(){
        return static::$userToken;
    }
    public static function generateToken()
    {
        $getTokenFromJsonFile=static::getTokenFromJsonFile();
        $app =  Config::getApp();
        $appkey = $app['info']['APP_KEY'];
        $appSecret = $app['info']['APP_SECRET'];
        $uri = Url::$api['gettoken'];
        $body = [
            'appKey' => $appkey,
            'appSecret' => $appSecret
        ];

        $has_token = false;
        $res = ApiRequest::post($uri, $body, $has_token);
        $token = json_decode($res, true);
        $expires_in = $token['expireIn'];
        $token['expireIn'] = $expires_in + time();
        if(true===$getTokenFromJsonFile){
            $filename = $app['v2']['access_token']['file_path'];
            $data = json_encode($token);
            file_put_contents($filename, $data);
        }else{
            static::$token=$token;
            
        }
       
    }
    public static function getGeneratedToken(){
        return static::$token;
    }

    public static function generateUserToken()
    {
        $uri = Url::$api['getUserToken'];
        $app =  Config::getApp();
        $appkey = $app['info']['APP_KEY'];
        $appSecret = $app['info']['APP_SECRET'];
        $body = [
            'clientId' => $appkey,
            'clientSecret' => $appSecret,
            'grantType' => self::getGrantType(),
            'code' =>  self::getCode(),
            'refreshToken' =>  self::getRefreshToken()
        ];
        $has_token = false;
        $res = ApiRequest::post($uri, $body, $has_token);
        $token = json_decode($res, true);
        $expires_in = $token['expireIn'];
        $token['expireIn'] = $expires_in + time();
        return $token;
    }

    public static function setUserToken(string $unionId)
    {


        $uri = Url::$api['contact'] . "/users/$unionId";
        $at =  Config::getApp()['userAccessToken'];
        $file_path = $at['file_path'];
        $res = '';
        $key = '';
        $file_info = pathinfo($file_path);
        $file_path_info = $file_info['dirname'] . '/' . $file_info['basename'];
        if (!file_exists($file_path)) {
            throw new Exception($file_path_info . ' 文件不存在');
        }
        $file_contents = json_decode(file_get_contents($file_path), true);
        if ($unionId == 'me') {
            self::setGrantType('authorization_code');
            $generatedUserToken = self::generateUserToken();

            $accessToken = $generatedUserToken['accessToken'];

            $res = ApiRequest::userGetReq($uri, $accessToken);

            $userinfo = json_decode($res, true);

            $key = $userinfo['unionId'];
            if (empty($file_contents) || !array_key_exists($key, $file_contents)  || $file_contents[$key]['token_info']['expireIn'] - $at['expires'] < time()) {
                $file_contents[$key] = ['user_info' => $userinfo, 'token_info' => $generatedUserToken];
            }
            return file_put_contents($file_path, json_encode($file_contents)) ? $res : false;
        } else {
            if (empty($file_contents) || !array_key_exists($unionId, $file_contents)) {
                $refreshToken = $file_contents[$unionId]['token_info']['refreshToken'];

                self::setGrantType('authorization_code')->setRefreshToken($refreshToken);
                
                $generatedUserToken = self::generateUserToken();

                $file_contents[$unionId]['token_info'] = $generatedUserToken;

                return file_put_contents($file_path, json_encode($file_contents)) ? $file_contents[$unionId] : false;
            } elseif ($file_contents[$unionId]['token_info']['expireIn'] - $at['expires'] < time()) {
                $refreshToken = $file_contents[$unionId]['token_info']['refreshToken'];

                self::setGrantType('refresh_token')->setRefreshToken($refreshToken);

                $generatedUserToken = self::generateUserToken();

                $file_contents[$unionId]['token_info'] = $generatedUserToken;
                
                return file_put_contents($file_path, json_encode($file_contents)) ? $file_contents[$unionId] : false;
            } else {
                return $file_contents[$unionId];
            }
        }
        return false;
    }
}
