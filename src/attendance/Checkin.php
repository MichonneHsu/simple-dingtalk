<?php

declare(strict_types=1);

namespace SimpleDingTalk\attendance;
use SimpleDingTalk\Url;
use SimpleDingTalk\ApiRequest;
use SimpleDingTalk\util\Time;
/**
 * 考勤打卡
 */
class Checkin
{
    /**
     * 获取打卡结果
     *
     * @param string $workDateFrom
     * @param string $workDateTo
     * @param array $userIdList
     * @param integer $offset
     * @param integer $limit
     * @param boolean $isI18n
     * @return mixed
     */
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
        return ApiRequest::post($uri, $json);
    }
    /**
     * 获取打卡详情
     *
     * @param array $userIds
     * @param string $checkDateFrom
     * @param string $checkDateTo
     * @param boolean $isI18n
     * @return mixed
     */
    public static function get_list_record(array $userIds,string $checkDateFrom,string $checkDateTo,bool $isI18n=false)
    {
        $uri=Url::$api['attendance']['checkin']['get_list_record'];
      
        $json = [
            'userIds' => $userIds,
            'checkDateFrom'=>$checkDateFrom,
            'checkDateTo'=>$checkDateTo,
            'isI18n'=>$isI18n
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 上传打卡记录
     *
     * @param string $userid
     * @param string $device_name
     * @param string $device_id
     * @param string $user_check_time
     * @param string $photo_url
     * @return mixed
     */
    public static function upload(string $userid,string $device_name,string $device_id,string $user_check_time,string $photo_url='')
    {
        $uri=Url::$api['attendance']['checkin']['upload'];
      
        $json = [
            'userid' => $userid,
            'device_name'=>$device_name,
            'device_id'=>$device_id,
            'user_check_time'=>Time::toTime($user_check_time),
            'photo_url'=>$photo_url
        ];
        return ApiRequest::post($uri, $json);
    }
}