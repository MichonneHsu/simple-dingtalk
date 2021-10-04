<?php
declare(strict_types=1);
namespace SimpleDingding;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Message;

class apiRequest{
  
   
    public static function client(){
        return  new Client(['base_uri'=>Uris::$urls['domain']]);
    }
   
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
    
    public static function joinParams(string $uri, array $params):string
    {

      
      
       
        return urldecode($uri.'?' . http_build_query($params));
    }
}