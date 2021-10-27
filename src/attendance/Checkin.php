<?php

declare(strict_types=1);

namespace SimpleDingTalk\attendance;
use SimpleDingTalk\Url;
use SimpleDingTalk\apiRequest;
class Checkin
{
    public static function get_list(string $workDateFrom,string $workDateTo,array $userIdList,int $offset=0,int $limit=10,bool $isI18n=false)
    {
        $uri=Url::$api['attendance']['checkin']['get_list'];
      
        $json = [
            'workDateFrom' => $workDateFrom,
            'workDateTo'=>$workDateTo,
            'userIdList'=>$userIdList,
            'offset'=>$offset,
            'limit'=>$limit,
            'isI18n'=>$isI18n
        ];
        return apiRequest::post($uri, $json);
    }
    public static function get_list_record(array $userIds,string $checkDateFrom,string $checkDateTo,bool $isI18n=false)
    {
        $uri=Url::$api['attendance']['checkin']['get_list_record'];
      
        $json = [
            'userIds' => $userIds,
            'checkDateFrom'=>$checkDateFrom,
            'checkDateTo'=>$checkDateTo,
            'isI18n'=>$isI18n
        ];
        return apiRequest::post($uri, $json);
    }
    public static function upload(string $userid,string $device_name,string $device_id,string $user_check_time,string $photo_url='')
    {
        $uri=Url::$api['attendance']['checkin']['upload'];
      
        $json = [
            'userid' => $userid,
            'device_name'=>$device_name,
            'device_id'=>$device_id,
            'user_check_time'=>$user_check_time,
            'photo_url'=>$photo_url
        ];
        return apiRequest::post($uri, $json);
    }
}