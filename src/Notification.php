<?php declare(strict_types=1);

namespace SimpleDingTalk;



class Notification{
 
  
    public static function send(array $json)
    {

        $uri=Url::joinParams(Url::$api['notification']['corpconversation'],[
            'access_token'=>AccessToken::getToken()
        ]);
        

        $json=array_merge($json,[
            'agent_id'=>Config::$app_info['AGENT_ID']
        ]);
        return apiRequest::post($uri, $json);
     
    }
}