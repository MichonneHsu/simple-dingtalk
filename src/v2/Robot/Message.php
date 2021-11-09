<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Robot;
use SimpleDingTalk\Config;
use SimpleDingTalk\v2\Url;
class Message{
   
    /**
     * 批量发送单聊消息
     *
     * @param array $userIds
     * @param string $msgKey
     * @param array $msgParam
     * @return mixed
     */
    public static function oToMessages_batchSend(array $userIds, string $msgKey,array $msgParam)
    {
        $robot_type=Config::$robot_type;
        $robotCode=Config::$app_info['robot'][$robot_type]['info']['APP_KEY'];
      
        $uri = Url::$api['robot']['oToMessages_batchSend'];
        $body=[
            'robotCode'=>$robotCode,
            'userIds'=>$userIds,
            'msgKey'=>$msgKey,
            'msgParam'=>json_encode($msgParam)
        ];
    
        return apiRequest::post($uri, $body);
    }
    /**
     * 发送钉钉可交互式动态卡片
     *
     * @param array $body
     * @return mixed
     */
    public static function interactiveCards_send(array $body)
    {
        $uri = Url::$api['robot']['interactiveCards_send'];
        return apiRequest::post($uri, $body);
    }
}