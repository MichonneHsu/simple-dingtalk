<?php

declare(strict_types=1);

namespace SimpleDingTalk;

use Exception;

class AccessToken
{

    public $expires = 0;
    public  $path = '';
    public  $APP_KEY = '';
    public $APP_SECRET = '';
    public function __construct(array $config)
    {
        $this->expires=$config['expires'];
        $this->path=$config['path'];
        $this->APP_KEY=$config['APP_KEY'];
        $this->APP_SECRET=$config['APP_SECRET'];
    }
    public  function getToken(): string
    {
        if (!file_exists($this->path)) {
            throw new Exception($this->path . ' 文件不存在');
        }
        $filename = $this->path;
        $json = file_get_contents($filename);
        if (empty($json)) {
            $this->generateToken();

            // Log::channel('token')->info('空内容，需重新生成');
        } else {
            $token = json_decode($json, true);
            if (($token['expires_in'] - 300) < time()) {
                $this->generateToken();

                // Log::channel('token')->info('超时,重新获取内容');
            }
        }

        $json = file_get_contents($filename);
        $token = json_decode($json, true);

        // Log::info($token);
        return  $token['access_token'];
    }
    public  function generateToken()
    {


        $appkey = $this->APP_KEY;
        $appSecret = $this->APP_SECRET;
        $uri = Uri::$api['gettoken'];
        $query = [
            'appkey' => $appkey,
            'appsecret' => $appSecret
        ];
        $json = apiRequest::get($uri, $query);
        $token = json_decode($json, true);
        $expires_in = $token['expires_in'];
        $token['expires_in'] = $expires_in + time();
        $filename = self::$path;
        $data = json_encode($token);
        file_put_contents($filename, $data);
    }
}
