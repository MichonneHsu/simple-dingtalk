<?php

declare(strict_types=1);

namespace SimpleDingTalk;



class WorkFlow
{

      /**
     * 发起审批实例
     *
     * @param array $json
     * @return mixed
     */
    public static function create(array $json){
        $uri=Url::joinParams(Url::$api['workflow']['create'],[
            'access_token'=>AccessToken::getToken()
        ]);
        $json=array_merge($json,[
            'agent_id'=>Config::$app_info['AGENT_ID']
        ]);
        return apiRequest::post($uri, $json);
    }
 
}
