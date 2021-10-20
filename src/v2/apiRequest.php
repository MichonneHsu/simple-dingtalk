<?php declare(strict_types=1);

namespace SimpleDingTalk\v2;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Message;
use GuzzleHttp\Psr7\Request;
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
     * 客户端请求基本信息
     *
     * @param string $method
     * @param string $uri
     * @param string $body
     * @param array $header
     * @return Request
     */
    public static function request(string $method,string $uri,array $header=[]){
        return new Request($method,$uri,$header);
    }
    /**
     * get请求
     *
     * @param string $uri
     * @param array $query
     * @return mixed
     */
    public static function get(string $uri,array $query=[],bool $has_headers=true){
      
        try {
            $client = self::client();
            $resp=null;
            if(empty($query)){
                $resp=$client->request('GET',$uri);
            }else{
                if($has_headers){
                    $resp=$client->request('GET',$uri,[
                        'query'=>$query,
                        'headers'=>[
                            'x-acs-dingtalk-access-token'=>AccessToken::getToken()
                        ]
                    ]);
                }else{
                    $resp=$client->request('GET',$uri,[
                        'query'=>$query
                    ]);
                }
               
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
     * @param boolean $has_headers
     * @return mixed
     */
    public static function post(string $uri,array $json=[],bool $has_headers=true){
      
        try {
            $client = self::client();
            $resp=null;
            if(empty($json)){
                $resp=$client->request('POST',$uri);
            }else{
                if($has_headers){
                    $resp=$client->request('POST',$uri,[
                        'json'=>$json,
                        'headers'=>[
                            'x-acs-dingtalk-access-token'=>AccessToken::getToken()
                        ]
                    ]);
                }else{
                    $resp=$client->request('POST',$uri,[
                        'json'=>$json
                    ]);
                }
               
            }
            
           
            $content=$resp->getBody()->getContents();
          
           
            return $content;
        } catch (RequestException $e) {
            throw new \Exception(Message::toString($e->getResponse()));
           
        }
    }
    
    public static function REST(string $method,string $uri,array $json,bool $has_header=true){
      
        try {
            $client=self::client();
          
            $rep=null;
            if($has_header){
                $rep=self::request($method,$uri,[
                    'x-acs-dingtalk-access-token'=>AccessToken::getToken()
                ]);
               
            }else{
                $rep=self::request($method,$uri);
            }
           
            $resp=$client->send($rep,['timeout'=>2,'json'=>$json]);
           
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