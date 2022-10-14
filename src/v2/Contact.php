<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;

/**通讯录 */
class Contact
{
    public static function getPersonalInfo(string $unionId)
    {
        return AccessToken::setUserToken($unionId);
    }
    public static function invites_infos(string $inviterUserId = '', string $deptId = '')
    {
        $uri = Url::$api['contact'] . '/invites/infos';
        $params = [
            'inviterUserId' => $inviterUserId,
            'deptId' => $deptId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::get($uri);
    }
    public static function dingIndexs()
    {
        $uri = Url::$api['contact'] . '/dingIndexs';

        return ApiRequest::get($uri);
    }
    public static function depts_settings_priorities(bool $enable)
    {
        $uri = Url::$api['contact'] . '/depts/settings/priorities';
        $body = [
            'enable' => $enable
        ];
        return ApiRequest::post($uri, $body);
    }
    public static function exclusive_enable(string $userId)
    {
        $uri = Url::$api['contact'] . '/orgAccounts/enable';
        $body = [
            'userId' => $userId
        ];
        return ApiRequest::post($uri, $body);
    }
    public static function exclusive_disable(string $userId, string $reason)
    {
        $uri = Url::$api['contact'] . '/orgAccounts/enable';
        $body = [
            'userId' => $userId,
            'reason' => $reason
        ];
        return ApiRequest::post($uri, $body);
    }
    public static function seniorSettings(array $body)
    {
        $uri = Url::$api['contact'] . '/seniorSettings';
        
        return ApiRequest::post($uri, $body);
    }
}
