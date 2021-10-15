<?php

declare(strict_types=1);

namespace SimpleDingTalk;



class CorpMessage
{

  /**
   * 发送消息到企业群
   *
 
   * @param string $cid
   * @param array $msg
   * @return mixed
   */
    public static function send(string $chatid,array $msg)
    {

        $uri = Url::joinParams(Url::$api['corpMessage']['send'], [
            'access_token' => AccessToken::getToken()
        ]);


        $json =[
            'chatid'=>$chatid,
            'msg'=>$msg
        ];
        return apiRequest::post($uri, $json);
    }
   
}
