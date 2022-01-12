<?php declare(strict_types=1);

namespace SimpleDingTalk\v2\Robot;


use SimpleDingTalk\v2\Url;
class ApiRequest{
  
   
   /**
     * get请求
     *
     * @param string $uri
     * @param array $body
     * @param boolean $has_token
     * @return mixed
     */
    public static function get(string $uri,array $body=[],bool $has_token=true){
      
        return self::REST('get',$uri,$body,$has_token);
    }
    /**
     * post请求
     *
     * @param string $uri
     * @param array $body
     * @param boolean $has_token
     * @return mixed
     */
    public static function post(string $uri,array $body=[],bool $has_token=true){
      
        return self::REST('post',$uri,$body,$has_token);
    }
    /**
     * delete
     *
     * @param string $uri
     * @param array $body
     * @param boolean $has_token
     * @return mixed
     */
    public static function delete(string $uri,array $body=[],bool $has_token=true){
      
        return self::REST('delete',$uri,$body,$has_token);
    }
    /**
     * delete
     *
     * @param string $uri
     * @param array $body
     * @param boolean $has_token
     * @return mixed
     */
    public static function put(string $uri,array $body,bool $has_token=true){
      
        return self::REST('put',$uri,$body,$has_token);
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
    public static function REST(string $method,string $uri,array $body=[],bool $has_token=true){
        
        return self::http_request($method,$uri,$body,$has_token);
     
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
    public static function http_request(string $method,string $uri,array $body=[],bool $has_token=true)
    {
       
        $uri=Url::$api['domain'].$uri;
        $header[]='Content-Type: application/json';
    
        if($has_token){
         
            $header[]='x-acs-dingtalk-access-token:'.AccessToken::getToken();
      
          
        }
      
        
        $method=strtoupper($method);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_URL, $uri);
        curl_setopt($ch, CURLOPT_TIMEOUT, 2);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        $body=empty($body)?'':json_encode($body);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        $res=curl_exec($ch);
        curl_close($ch);
        return $res;
    }
    
   
  
  
    public static function joinParams(string $uri, array $params,bool $encode=false): string
    {


        $url = $uri . '?' . http_build_query($params);

        return $encode?urlencode($url):$url;
    }
}