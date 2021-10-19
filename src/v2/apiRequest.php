<?php declare(strict_types=1);

namespace SimpleDingTalk\v2;

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
            throw Message::toString($e->getResponse());
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
            throw Message::toString($e->getResponse());
           
        }
    }
  
  
    public static function joinParams(string $uri, array $params):string
    {

  
        $url = $uri.'?' . http_build_query($params);
       
        return urldecode($url);
    }
}