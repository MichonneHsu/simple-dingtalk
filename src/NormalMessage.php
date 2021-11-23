<?php

declare(strict_types=1);

namespace SimpleDingTalk;



class NormalMessage
{

  /**
   * 发送消息到企业群
   *
   * @param string $sender
   * @param string $cid
   * @param array $msg
   * @return mixed
   */
    public static function send(string $sender,string $cid,array $msg)
    {

        $uri = Url::$api['normalMessage']['send_to_conversation'];


        $json =[
            'sender'=>$sender,
            'cid'=>$cid,
            'msg'=>$msg
        ];
        return ApiRequest::post($uri, $json);
    }
   
}
