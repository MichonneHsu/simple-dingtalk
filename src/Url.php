<?php declare(strict_types=1);

namespace SimpleDingTalk;



class Url{
 
  
    public static function joinParams(string $uri, array $params):string
    {

  
        $url = $uri.'?' . http_build_query($params);
       
        return urldecode($url);
    }
}