<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;
use SimpleDingTalk\Config;
class Robot{
   
    /**
     * 批量发送单聊消息
     *
     * @param array $userIds
     * @param string $msgKey
     * @param array $msgParam
     * @return mixed
     */
    public static function batchSend(array $userIds, string $msgKey,array $msgParam)
    {
        $robot_type=Config::$robot_type;
        $robotCode=Config::$app_info['robot'][$robot_type]['info']['APP_KEY'];
        $uri = Url::$api['robot'] .'/oToMessages/batchSend';
        $body=[
            'robotCode'=>$robotCode,
            'userIds'=>$userIds,
            'msgKey'=>$msgKey,
            'msgParam'=>json_encode($msgParam)
        ];
    
        return apiRequest::post($uri, $body);
    }
}