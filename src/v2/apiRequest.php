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
    public static function request(string $method,string $uri,string $body='',array $header=[]){
        return new Request($method,$uri,$header,$body);
    }
   /**
     * get请求
     *
     * @param string $uri
     * @param array $body
     * @param boolean $has_headers
     * @return mixed
     */
    public static function get(string $uri,array $body=[],bool $has_headers=true){
      
        return self::REST('get',$uri,$body,$has_headers);
    }
    /**
     * post请求
     *
     * @param string $uri
     * @param array $body
     * @param boolean $has_headers
     * @return mixed
     */
    public static function post(string $uri,array $body=[],bool $has_headers=true){
      
        return self::REST('post',$uri,$body,$has_headers);
    }
    /**
     * delete
     *
     * @param string $uri
     * @param array $body
     * @param boolean $has_headers
     * @return mixed
     */
    public static function delete(string $uri,array $body=[],bool $has_headers=true){
      
        return self::REST('delete',$uri,$body,$has_headers);
    }
    /**
     * delete
     *
     * @param string $uri
     * @param array $body
     * @param boolean $has_headers
     * @return mixed
     */
    public static function put(string $uri,array $body,bool $has_headers=true){
      
        return self::REST('put',$uri,$body,$has_headers);
    }
    public static function REST(string $method,string $uri,array $body=[],bool $has_header=true){
        
        try {
            $client=self::client();
            $body=empty($body)?'':json_encode($body);
            $header=[];
            $rep=null;
            if($has_header){
               
                   $header['x-acs-dingtalk-access-token']=AccessToken::getToken();
              
               
            }
            $rep=self::request($method,$uri,$body,$header);
            $resp=$client->send($rep,['timeout'=>2]);
           
            $content=$resp->getBody()->getContents();
          
           
            return $content;
        } catch (RequestException $e) {
            throw new \Exception(Message::toString($e->getResponse()));
           
        }
    }
    
   
    public static function token_post(string $uri, array $json)
    {

        try {
            $client = self::client();
            $resp = $client->request('POST', $uri, [
                'json' => $json
            ]);

            $content = $resp->getBody()->getContents();


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