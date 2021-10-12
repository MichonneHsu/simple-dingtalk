<?php

declare(strict_types=1);

namespace SimpleDingTalk;



class WorkFlow
{

    /**
     * 创建或更新审批模板
     *
     * @param array $json
     * @return mixed
     */
    public static function save(array $json){
        $uri=Url::joinParams(Url::$api['workflow']['save'],[
            'access_token'=>AccessToken::getToken()
        ]);
        $pre=$json;
        $json['saveProcessRequest']=array_merge($pre,[
            'agent_id'=>Config::$app_info['AGENT_ID']
        ]);
        return apiRequest::post($uri, $json);
    }
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
    /**
     * 终止审批流程
     *
     * @param array $json
     * @return mixed
     */
    public static function terminate(array $json){
        $uri=Url::joinParams(Url::$api['workflow']['terminate'],[
            'access_token'=>AccessToken::getToken()
        ]);
       
        return apiRequest::post($uri, $json);
    }
    
}
