<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;

use SimpleDingTalk\Config;
use Exception;

class Contact
{
    public static function getPersonalInfo(string $unionId)
    {
        $at = Config::$app_info['app'][Config::$app_type]['userAccessToken'];
        $file_path = $at['file_path'];
        if(AccessToken::setUserToken($unionId)){
            return file_get_contents($file_path);
        }
        return '';
    }
    public static function invites_infos(string $inviterUserId = '', string $deptId = '')
    {
        $uri = Url::$api['contact'] . 'invites/infos';
        $params = [
            'inviterUserId' => $inviterUserId,
            'deptId' => $deptId
        ];
        $uri = apiRequest::joinParams($uri, $params);
        return apiRequest::get($uri);
    }
    public static function dingIndexs()
    {
        $uri = Url::$api['contact'] . 'dingIndexs';

        return apiRequest::get($uri);
    }
    public static function depts_settings_priorities(bool $enable)
    {
        $uri = Url::$api['contact'] . 'depts/settings/priorities';
        $body = [
            'enable' => $enable
        ];
        return apiRequest::post($uri, $body);
    }
}
