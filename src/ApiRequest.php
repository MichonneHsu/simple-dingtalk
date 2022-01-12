<?php

declare(strict_types=1);

namespace SimpleDingTalk;



class ApiRequest
{
    /**
     * get请求
     *
     * @param string $uri
     * @param array $query
     * @return mixed
     */
    public static function get(string $uri, array $query = [], bool $has_token = true)
    {
        if(!empty($query)){
            $uri=self::joinParams($uri,$query);
        }
       

        return self::http_request('get', $uri, $query, $has_token);

    }
    /**
     * post请求
     *
     * @param string $uri
     * @param array $json
     * @param boolean $has_token
     * @return mixed
     */
    public static function post(string $uri, array $json = [], bool $has_token = true)
    {
        return self::http_request('post', $uri, $json, $has_token);

   
    }
    /**
     * HTTP请求
     *
     * @param string $method
     * @param string $uri
     * @param array $body
     * @param boolean $has_token
     * @return mixed
     */
    public static function http_request(string $method, string $uri, array $body = [], bool $has_token = true)
    {

        $uri = Url::$api['domain'] . $uri;
        $header[] = 'Content-Type: application/json';

        if ($has_token) {

            $uri = self::joinParams($uri, [
                'access_token' => AccessToken::getToken()
            ]);
        }


        $method = strtoupper($method);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_URL, $uri);
        curl_setopt($ch, CURLOPT_TIMEOUT, 2);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        
        if(!empty($body) && $method=='POST'){
          
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        }
      
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }

    public static function joinParams(string $uri, array $params, bool $encode = false): string
    {


        $url = $uri . '?' . http_build_query($params);

        return $encode ? urlencode($url) : $url;
    }
}
