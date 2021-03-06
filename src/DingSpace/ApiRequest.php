<?php

declare(strict_types=1);

namespace SimpleDingTalk\DingSpace;


use SimpleDingTalk\AccessToken;
use SimpleDingTalk\Url;


class ApiRequest
{
   
    public static function get(string $uri, array $query = [], bool $has_token = true)
    {
        return self::http_request('get',$uri,$query,$has_token);

      
    }
    /**
     * post请求
     *
     * @param string $uri
     * @param array $json
     * @return mixed
     */
    public static function post(string $uri, array $json = [], bool $has_token = true)
    {
        return self::http_request('post',$uri,$json,$has_token);
    }

    public static function upload_file(string $uri, array $params=[], array $file_infos)
    {
        $uri = Url::$api['domain'] . $uri;
        
        $params['access_token'] = AccessToken::getToken();
        $uri = self::joinParams($uri, $params);
        


        $curl = curl_init();

        curl_setopt_array($curl, array(

            CURLOPT_URL => $uri,

            CURLOPT_RETURNTRANSFER => true,

            CURLOPT_ENCODING => '',

            CURLOPT_MAXREDIRS => 10,

            CURLOPT_TIMEOUT => 0,

            CURLOPT_FOLLOWLOCATION => true,

            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

            CURLOPT_CUSTOMREQUEST => 'POST',

            CURLOPT_POSTFIELDS => $file_infos,

        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }
    public static function http_request(string $method,string $uri,array $body=[],bool $has_token=true)
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
