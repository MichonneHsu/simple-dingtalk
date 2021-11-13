<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Robot;

use SimpleDingTalk\Config;
use SimpleDingTalk\v2\Url;
use SimpleDingTalk\apiRequest as v1_req;
use SimpleDingTalk\util\robot\Sign;

class Message
{

    /**
     * 批量发送单聊消息
     *
     * @param array $userIds
     * @param string $msgKey
     * @param array $msgParam
     * @return mixed
     */
    public static function oToMessages_batchSend(array $userIds, string $msgKey, array $msgParam)
    {
        $robot_type = Config::$robot_type;
        $robotCode = Config::$app_info['robot'][$robot_type]['info']['APP_KEY'];

        $uri = Url::$api['robot']['oToMessages_batchSend'];
        $body = [
            'robotCode' => $robotCode,
            'userIds' => $userIds,
            'msgKey' => $msgKey,
            'msgParam' => json_encode($msgParam)
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
    public static function scencegroup_chat(array $body)
    {
        $uri = Url::$api['robot']['scencegroup_chat'];
        return v1_req::post($uri, $body);
    }
    /**
     * 注册互动卡片回调地址
     *
     * @param string $callback_url
     * @param string $api_secret
     * @param string $callbackRouteKey
     * @param boolean $forceUpdate
     * @return mixed
     */
    public static function callback_register(string $callback_url, string $api_secret = '', string $callbackRouteKey = '', bool $forceUpdate = false)
    {
        $uri = Url::$api['robot']['callback_register'];
        $json = [
            'callback_url' => $callback_url,
            'api_secret' => $api_secret,
            'callbackRouteKey' => $callbackRouteKey,
            'forceUpdate' => $forceUpdate
        ];
        return v1_req::post($uri, $json);
    }
    public static function send_group_msg(string $msgtype, array $content)
    {
        $params = Sign::signature();

        $uri = Url::$api['robot']['send_group_msg'];
        $uri = v1_req::joinParams($uri, $params);
        $json = [
            'msgtype' => $msgtype,
            $msgtype => $content
        ];
        return v1_req::post($uri, $json);
    }
    public static function update_card(array $body)
    {
       

        $uri = Url::$api['robot']['card'];
     
        return apiRequest::put($uri, $body);
    }

    

}