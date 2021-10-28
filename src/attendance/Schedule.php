<?php

declare(strict_types=1);

namespace SimpleDingTalk\attendance;
use SimpleDingTalk\Url;
use SimpleDingTalk\apiRequest;
use SimpleDingTalk\util\date\Time;
/**
 * 考勤排班
 */
class Schedule
{
  
    public static function listbyday(string $op_user_id,string $user_id,string $date_time)
    {
        
        $uri=Url::$api['attendance']['schedule']['listbyday'];
      
        $json = [
            'op_user_id' => $op_user_id,
            'user_id'=>$user_id,
            'date_time'=>Time::toTime($date_time,true)
         
        ];
      
        return apiRequest::post($uri, $json);
    }
    public static function listbyusers(string $op_user_id,string $userids,string $from_date_time,string $to_date_time)
    {
        $uri=Url::$api['attendance']['schedule']['listbyusers'];
      
        $json = [
            'op_user_id' => $op_user_id,
            'userids'=>$userids,
            'from_date_time'=>Time::toTime($from_date_time,true),
            'to_date_time'=>Time::toTime($to_date_time,true),
         
        ];
        return apiRequest::post($uri, $json);
    }
    public static function set(string $op_user_id,int $group_id,array $schedules)
    {
        $uri=Url::$api['attendance']['schedule']['set'];
      
        $json = [
            'op_user_id' => $op_user_id,
            'group_id'=>$group_id,
            'schedules'=>$schedules
        ];
        return apiRequest::post($uri, $json);
    }
    public static function listbyids(string $op_user_id,string $schedule_ids)
    {
        $uri=Url::$api['attendance']['schedule']['listbyids'];
      
        $json = [
            'op_user_id' => $op_user_id,
            'schedule_ids'=>$schedule_ids
        ];
        return apiRequest::post($uri, $json);
    }
    public static function listschedule(string $workDate,int $offset=0,int $size=10)
    {
        $uri=Url::$api['attendance']['schedule']['listschedule'];
      
        $json = [
            'workDate' => $workDate,
            'offset'=>$offset,
            'size'=>$size
        ];
        return apiRequest::post($uri, $json);
    }
    public static function listbydays(string $op_user_id,string $userids,string $from_date_time,string $to_date_time)
    {
        $uri=Url::$api['attendance']['schedule']['listbydays'];
      
        $json = [
            'op_user_id' => $op_user_id,
            'userids'=>$userids,
            'from_date_time'=>$from_date_time,
            'to_date_time'=>$to_date_time
        ];
        return apiRequest::post($uri, $json);
    }
}