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

        $uri = Url::$api['corpMessage']['send'];


        $json =[
            'chatid'=>$chatid,
            'msg'=>$msg
        ];
        return ApiRequest::post($uri, $json);
    }
    public static function getReadList(string $messageId,int $size=5,int $cursor=0)
    {

        $uri =Url::$api['corpMessage']['getReadList'];

        $query =[
            'messageId'=>urlencode($messageId),
            'size'=>$size,
            'cursor'=>$cursor
        ];
        return ApiRequest::get($uri, $query);
       
    }
   
}
