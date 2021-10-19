<?php declare(strict_types=1);

namespace SimpleDingTalk;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Message;

class apiRequest{
  
    /**
     * 客户端请求基本信息
     *
     * @return Client
     */
    public static function client(){
        return  new Client(['base_uri'=>Url::$api['domain']]);
    }
    /**
     * get请求
     *
     * @param string $uri
     * @param array $query
     * @return mixed
     */
    public static function get(string $uri,array $query=[]){
      
        try {
            $client = self::client();
            $resp=null;
            if(empty($query)){
                $resp=$client->request('GET',$uri);
            }else{
                $resp=$client->request('GET',$uri,[
                    'query'=>$query
                ]);
            }
           
           
            $content=$resp->getBody()->getContents();
           
            return $content;
        } catch (RequestException $e) {
            throw new \Exception(Message::toString($e->getResponse()));
        }
    }
    /**
     * post请求
     *
     * @param string $uri
     * @param array $json
     * @return mixed
     */
    public static function post(string $uri,array $json=[]){
      
        try {
            $client = self::client();
            $resp=null;
            if(empty($json)){
                $resp=$client->request('POST',$uri);
            }else{
                $resp=$client->request('POST',$uri,[
                    'json'=>$json
                ]);
            }
            
           
            $content=$resp->getBody()->getContents();
          
           
            return $content;
        } catch (RequestException $e) {
            throw new \Exception(Message::toString($e->getResponse()));
           
        }
    }
  
  
    public static function joinParams(string $uri, array $params):string
    {

  
        $url = $uri.'?' . http_build_query($params);
       
        return urldecode($url);
    }
}