<?php

declare(strict_types=1);

namespace SimpleDingTalk;

use Exception;

class AccessToken
{

   
    public static function getToken(): string
    {
        if (!file_exists(Config::access_token_file_path)) {
            throw new Exception(Config::access_token_file_path . ' 文件不存在');
        }
        $filename = Config::access_token_file_path;
        $json = file_get_contents($filename);
        if (empty($json)) {
            self::generateToken();

            // Log::channel('token')->info('空内容，需重新生成');
        } else {
            $token = json_decode($json, true);
            if (($token['expires_in'] - Config::expires) < time()) {
                self::generateToken();

                // Log::channel('token')->info('超时,重新获取内容');
            }
        }

        $json = file_get_contents($filename);
        $token = json_decode($json, true);
        
        // Log::info($token);
        return  $token['access_token'];
    }
    public static function generateToken()
    {


        $appkey = Config::APP_KEY;
        $appSecret = Config::APP_SECRET;
        $uri = Config::$api['gettoken'];
        $query = [
            'appkey' => $appkey,
            'appsecret' => $appSecret
        ];
        $json = apiRequest::get($uri, $query);
        $token = json_decode($json, true);
        $expires_in = $token['expires_in'];
        $token['expires_in'] = $expires_in + time();
        $filename = Config::access_token_file_path;
        $data = json_encode($token);
        file_put_contents($filename, $data);
    }
}
