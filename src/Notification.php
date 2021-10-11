<?php declare(strict_types=1);

namespace SimpleDingTalk;



class Notification{
 
  
    public static function send(array $json)
    {

        $uri=Url::joinParams(Url::$api['notification']['corpconversation'],[
            'access_token'=>AccessToken::getToken()
        ]);
        

        $json=array_merge([
            'agent_id'=>Config::$app_info['AGENT_ID']
        ],$json);
        return apiRequest::post($uri, $json);
     
    }
}