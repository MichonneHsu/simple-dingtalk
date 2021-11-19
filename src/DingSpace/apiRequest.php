<?php

declare(strict_types=1);

namespace SimpleDingTalk\DingSpace;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Message;
use SimpleDingTalk\AccessToken;
use SimpleDingTalk\Url;

class apiRequest
{
    /**
     * 客户端请求基本信息
     *
     * @return Client
     */
    public static function client()
    {
        return  new Client(['base_uri' => Url::$api['domain']]);
    }
    /**
     * get请求
     *
     * @param string $uri
     * @param array $query
     * @return mixed
     */
    public static function get(string $uri, array $query = [], bool $has_token = true)
    {

        try {
            $client = self::client();
            $resp = null;
            if ($has_token) {
                $query['access_token'] = AccessToken::getToken();
            }

            $resp = $client->request('GET', $uri, [
                'query' => $query
            ]);


            $content = $resp->getBody()->getContents();

            return $content;
        } catch (RequestException $e) {
            throw new \Exception(Message::toString($e->getResponse()));
        }
    }
    /**
     * post请求
     *
     * @param string $uri
     * @param array $multipart
     * @return mixed
     */
    public static function post(string $uri, array $multipart = [], bool $has_token = true)
    {

        try {
            $client = self::client();
            $resp = null;
            if ($has_token) {
                $uri = self::joinParams($uri, [
                    'access_token' => AccessToken::getToken()
                ]);
            }

            $resp = $client->request('POST', $uri, [
                'multipart' => $multipart
            ]);
            
            $content = $resp->getBody()->getContents();


            return $content;
        } catch (RequestException $e) {
            throw new \Exception(Message::toString($e->getResponse()));
        }
    }


    public static function joinParams(string $uri, array $params): string
    {


        $url = $uri . '?' . http_build_query($params);

        return urldecode($url);
    }
}
