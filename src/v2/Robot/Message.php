<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Robot;

use SimpleDingTalk\Config;
use SimpleDingTalk\v2\Url;
use SimpleDingTalk\ApiRequest as v1_req;
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
       
        $robotCode = Config::getRobot()['info']['APP_KEY'];

        $uri = Url::$api['robot']['oToMessages_batchSend'];
        $body = [
            'robotCode' => $robotCode,
            'userIds' => $userIds,
            'msgKey' => $msgKey,
            'msgParam' => json_encode($msgParam)
        ];

        return ApiRequest::post($uri, $body);
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
        return ApiRequest::post($uri, $body);
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
    * @param string $callbackRouteKey
    * @param boolean $forceUpdate
    * @param string $api_secret
    * @return mixed
    */
    public static function callback_register(string $callback_url, string $callbackRouteKey = '', bool $forceUpdate = false,string $api_secret = '')
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
    /**
     * 更新钉钉可交互式卡片
     *
     * @param array $body
     * @return mixed
     */
    public static function update_card(array $body)
    {


        $uri = Url::$api['robot']['card'];

        return ApiRequest::put($uri, $body);
    }
    /**
     * 指定群发送消息
     *
     * @param array $json
     * @param string $group_token
     * @return mixed
     */
    public static function send_group_msg(array $json, string $group_token,bool $hasSign=false)
    {
        
        
        $params = $hasSign?Sign::signature():[];

        $uri = Url::$api['robot']['send_msg'];
        $params['access_token'] = $group_token;
        $uri = v1_req::joinParams($uri, $params);
        $has_token = false;
        return v1_req::post($uri, $json, $has_token);
    }
    /**
     * 通过webhook方式向指定对象发送消息
     *
     * @param array $json
     * @param string $target_token
     * @return mixed
     */
    public static function webhook(array $json, string $target_token)
    {

        $uri = Url::$api['robot']['send_msg'];
        $params['access_token'] = $target_token;
        $uri = ApiRequest::joinParams($uri, $params);
        $has_token = false;
        return v1_req::post($uri, $json, $has_token);
    }
    /**
     * 批量撤回单聊消息
     *
     * @param array $processQueryKeys
     * @return mixed
     */
    public static function batchRecall(array $processQueryKeys){
        $uri = Url::$api['robot']['batchRecall'];
        $robotCode = Config::getRobot()['info']['APP_KEY'];
        $body=[
            'robotCode'=>$robotCode,
            'processQueryKeys'=>$processQueryKeys
        ];
       
        return ApiRequest::post($uri, $body);
    }
}
