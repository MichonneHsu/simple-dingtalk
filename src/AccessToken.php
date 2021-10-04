<?php declare(strict_types=1);

namespace SimpleDingding;

use Exception;

final class AccessToken
{
    public $file_path = './access_token.json';
    public $APP_KEY = '';
    public $APP_SECRET = '';
  
    /**
     * 配置信息
     * 
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->APP_KEY = $config['APP_KEY'];
        $this->APP_SECRET = $config['APP_SECRET'];
    }
    public  function getToken()
    {
        $file_path = realpath($this->file_path);
        if (!file_exists($file_path)) {
            throw new Exception('File not exists');
        }
        $json = file_get_contents($file_path);
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

        $json = file_get_contents($file_path);
        $token = json_decode($json, true);

        // Log::info($token);
        return  $token['access_token'];
    }
    public  function generateToken()
    {


        $appkey = $this->APP_KEY;
        $appSecret = $this->APP_SECRET;
        $uri = Uris::$urls['gettoken'];
        $query = [
            'appkey' => $appkey,
            'appsecret' => $appSecret
        ];
        $json = apiRequest::get($uri, $query);
        $token = json_decode($json, true);
        $expires_in = $token['expires_in'];
        $token['expires_in'] = $expires_in + time();
        $filename = $this->file_path;
        $data = json_encode($token);
        file_put_contents($filename, $data);
    }
}



