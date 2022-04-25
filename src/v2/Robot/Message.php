<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Robot;

use SimpleDingTalk\Config;
use SimpleDingTalk\v2\Url;
use SimpleDingTalk\ApiRequest as v1_req;
use SimpleDingTalk\util\robot\Sign;
use SimpleDingTalk\util\Time;

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
    public static function callback_register(string $callback_url, string $callbackRouteKey = '', bool $forceUpdate = false, string $api_secret = '')
    {
        $uri = Url::$api['robot']['callback_register'];
        $json = [
            'callback_url' => $callback_url,
            'api_secret' => $api_secret,
            'callbackRouteKey' => $callbackRouteKey,
            'forceUpdate' => $forceUpdate
        ];
        return ApiRequest::old_request($uri, $json);
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
    public static function send_group_msg(array $json, string $group_token, bool $hasSign = false)
    {


        $params = $hasSign ? Sign::signature() : [];

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
    public static function batchRecall(array $processQueryKeys)
    {
        $uri = Url::$api['robot']['batchRecall'];
        $robotCode = Config::getRobot()['info']['APP_KEY'];
        $body = [
            'robotCode' => $robotCode,
            'processQueryKeys' => $processQueryKeys
        ];

        return ApiRequest::post($uri, $body);
    }



    /**
     * 发送机器人群聊消息
     *
     * @param array $msgParam
     * @param string $msgKey
     * @param string $openConversationId
     * @return mixed
     */
    public static function sendGroupMessages(array $msgParam, string $msgKey, string $openConversationId)
    {
        $uri = Url::$api['robot']['sendGroupMessages'];
        $robotCode = Config::getRobot()['info']['APP_KEY'];
        $body = [
            'msgParam' => json_encode($msgParam, JSON_UNESCAPED_UNICODE),
            'msgKey' => $msgKey,
            'openConversationId' => $openConversationId,
            'robotCode' => $robotCode
        ];

        return ApiRequest::post($uri, $body);
    }
    /**
     * 批量查询机器人单聊消息是否已读
     *
     * @param string $processQueryKey
     * @return mixed
     */
    public static function readStatus(string $processQueryKey)
    {
        $uri = Url::$api['robot']['readStatus'];
        $robotCode = Config::getRobot()['info']['APP_KEY'];
        $params = [
            'processQueryKey' => $processQueryKey,
            'robotCode' => $robotCode
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::get($uri);
    }

    /**
     * 批量撤回群聊消息
     *
     * @param string $processQueryKey
     * @return mixed
     */
    public static function recallGroupMessages(string $openConversationId, array $processQueryKeys)
    {
        $uri = Url::$api['robot']['recallGroupMessages'];
        $robotCode = Config::getRobot()['info']['APP_KEY'];
        $body = [
            'openConversationId' => $openConversationId,
            'processQueryKeys' => $processQueryKeys,
            'robotCode' => $robotCode
        ];

        return ApiRequest::post($uri, $body);
    }
    /**
     * 查询机器人群聊消息已读状态
     *
     * @param string $openConversationId
     * @param string $processQueryKey
     * @param integer $maxResults
     * @param string $nextToken
     * @return mixed
     */
    public static function queryGroupMessages(string $openConversationId, string $processQueryKey, int $maxResults = 5, string $nextToken = '')
    {
        $uri = Url::$api['robot']['queryGroupMessages'];
        $robotCode = Config::getRobot()['info']['APP_KEY'];
        $body = [
            'openConversationId' => $openConversationId,
            'processQueryKey' => $processQueryKey,
            'maxResults' => $maxResults,
            'nextToken' => $nextToken,
            'robotCode' => $robotCode
        ];

        return ApiRequest::post($uri, $body);
    }
    /**
     * 发送吊顶卡
     *
     * @param array $body
     * @return mixed
     */
    public static function card_hanger(array $body)
    {
        $uri = Url::$api['robot']['card_hanger'];
        return ApiRequest::post($uri, $body);
    }
    /**
     * 开启互动卡片实例置顶
     *
     * @param string $openConversationId
     * @param string $outTrackId
     * @param string $expiredTime
     * @param string $platforms
     * @param string $coolAppCode
     * @return mixed
     */
    public static function card_hanger_open(string $openConversationId, string $outTrackId, string $expiredTime, string $platforms = 'ios|mac|android|win', string $coolAppCode = '')
    {
        $uri = Url::$api['robot']['card_hanger_open'];

        $body = [
            'openConversationId' => $openConversationId,
            'outTrackId' => $outTrackId,
            'expiredTime' => Time::toTime($expiredTime),
            'platforms' => $platforms,
            'coolAppCode' => $coolAppCode
        ];
        return ApiRequest::post($uri, $body);
    }
    /**
     * 关闭互动卡片实例置顶
     *
     * @param string $openConversationId
     * @param string $outTrackId
     * @param string $coolAppCode
     * @return mixed
     */
    public static function card_hanger_close(string $openConversationId, string $outTrackId, string $coolAppCode)
    {
        $uri = Url::$api['robot']['card_hanger_close'];
        $body = [
            'openConversationId' => $openConversationId,
            'outTrackId' => $outTrackId,
            'coolAppCode' => $coolAppCode
        ];
        return ApiRequest::post($uri, $body);
    }
}
