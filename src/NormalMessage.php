<?php

declare(strict_types=1);

namespace SimpleDingTalk;



class NormalMessage
{

    /**
     * 发送工作通知
     *
     * @param integer $task_id
     * @return mixed
     */
    public static function send(string $sender,string $cid,string $msg)
    {

        $uri = Url::joinParams(Url::$api['normalMessage']['send_to_conversation'], [
            'access_token' => AccessToken::getToken()
        ]);


        $json =[
            'sender'=>$sender,
            'cid'=>$cid,
            'msg'=>$msg
        ];
        return apiRequest::post($uri, $json);
    }
   
}
