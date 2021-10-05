<?php declare(strict_types=1);

namespace SimpleDingTalk;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Message;

final class apiRequest{
  
    /**
     * 客户端请求基本信息
     *
     * @return Client
     */
    public static function client(){
        return  new Client(['base_uri'=>Config::$api['domain']]);
    }
    /**
     * get请求
     *
     * @param string $uri
     * @param array $query
     * @return mixed
     */
    public static function get(string $uri,array $query){
      
        try {
            $client = self::client();
            $resp=$client->request('GET',$uri,[
                'query'=>$query
            ]);
           
            $content=$resp->getBody()->getContents();
          
         
           
            return $content;
        } catch (RequestException $e) {
            throw Message::toString($e->getResponse());
        }
    }
    /**
     * post请求
     *
     * @param string $uri
     * @param array $json
     * @return mixed
     */
    public static function post(string $uri,array $json){
      
        try {
            $client = self::client();
            $resp=$client->request('POST',$uri,[
                'json'=>$json
            ]);
           
            $content=$resp->getBody()->getContents();
          
           
            return $content;
        } catch (RequestException $e) {
            throw Message::toString($e->getResponse());
           
        }
    }
    public static function async_post(string $uri,array $options){
        $client = self::client();
        $client->requestAsync('POST',$uri,$options);
    }
   /**
    * url阐述拼接
    *
    * @param string $uri
    * @param array $params
    * @return string
    */
    public static function joinParams(string $uri, array $params):string
    {

        $url =  $uri;
        $url .= '?' . http_build_query($params);
       
        return urldecode($url);
    }
}