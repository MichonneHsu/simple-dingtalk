<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;


class ApiRequest
{

    /**
     * get请求
     *
     * @param string $uri
     * @param array $body
     * @param boolean $has_token
     * @return mixed
     */
    public static function get(string $uri, array $body = [], bool $has_token = true)
    {

        return self::REST('get', $uri, $body, $has_token);
    }
    /**
     * post请求
     *
     * @param string $uri
     * @param array $body
     * @param boolean $has_token
     * @return mixed
     */
    public static function post(string $uri, array $body = [], bool $has_token = true)
    {

        return self::REST('post', $uri, $body, $has_token);
    }
    /**
     * delete请求
     *
     * @param string $uri
     * @param array $body
     * @param boolean $has_token
     * @return mixed
     */
    public static function delete(string $uri, array $body = [], bool $has_token = true)
    {

        return self::REST('delete', $uri, $body, $has_token);
    }
    /**
     * put请求
     *
     * @param string $uri
     * @param array $body
     * @param boolean $has_token
     * @return mixed
     */
    public static function put(string $uri, array $body, bool $has_token = true)
    {

        return self::REST('put', $uri, $body, $has_token);
    }
    /**
     * REST请求
     *
     * @param string $method
     * @param string $uri
     * @param array $body
     * @param boolean $has_token
     * @return mixed
     */
    public static function REST(string $method, string $uri, array $body = [], bool $has_token = true)
    {

        return self::http_request($method, $uri, $body, $has_token);
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
            $header[] = 'x-acs-dingtalk-access-token:' . AccessToken::getToken();
        }
        $method = strtoupper($method);
        $ch = curl_init();
        curl_setopt_array($ch,[
            CURLOPT_HTTPHEADER=>$header,
            CURLOPT_RETURNTRANSFER=>true,
            CURLOPT_HEADER=>false,
            CURLOPT_URL=>$uri,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_TIMEOUT=>2,
            CURLOPT_CUSTOMREQUEST=>$method,
            CURLOPT_POSTFIELDS=>empty($body) ? '' : json_encode($body)
        ]);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_HEADER, 0);
        // curl_setopt($ch, CURLOPT_URL, $uri);
        // curl_setopt($ch, CURLOPT_TIMEOUT, 2);
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        // $body = empty($body) ? '' : json_encode($body);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }
    public static function userGetReq(string $uri, string $accessToken)
    {
        $uri = Url::$api['domain'] . $uri;
        $header = [
            'Content-Type: application/json',
            'x-acs-dingtalk-access-token:' . $accessToken
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_URL, $uri);
        curl_setopt($ch, CURLOPT_TIMEOUT, 2);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }



    // public static function send(string $method,string $uri,array $body,array $headers)
    // {


    //     $curl = curl_init();
       
    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => $uri,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_TIMEOUT => 2,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => strtoupper($method),
    //         CURLOPT_HTTPHEADER => $headers,
    //         CURLOPT_POSTFIELDS=>empty($body) ? '' : json_encode($body)
    //     ));

    //     $response = curl_exec($curl);

    //     curl_close($curl);
        
    //     return $response;

    // }
    public static function send(array $options)
    {


        $curl = curl_init();
       
        curl_setopt_array($curl,$options);

        $response = curl_exec($curl);

        curl_close($curl);
        
        return $response;

    }
    
    public static function joinParams(string $uri, array $params): string
    {


        $url = $uri . '?' . http_build_query($params);

        return $url;
    }
}
