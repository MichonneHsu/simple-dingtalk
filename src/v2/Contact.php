<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;



class Contact
{
    public static function getPersonalInfo(string $unionId)
    {
        $uri = Url::$api['contact']."users/$unionId";
      
        return apiRequest::userGetReq($uri);
    }
    public static function invites_infos(string $inviterUserId='',string $deptId='')
    {
        $uri = Url::$api['contact'].'invites/infos';
        $params=[
            'inviterUserId'=>$inviterUserId,
            'deptId'=>$deptId
        ];
        $uri = apiRequest::joinParams($uri, $params);
        return apiRequest::get($uri);
    }
    public static function dingIndexs()
    {
        $uri = Url::$api['contact'].'dingIndexs';
      
        return apiRequest::get($uri);
    }
    public static function depts_settings_priorities(bool $enable)
    {
        $uri = Url::$api['contact'].'depts/settings/priorities';
        $body=[
            'enable'=>$enable
        ];
        return apiRequest::post($uri,$body);
    }
    
}