<?php

declare(strict_types=1);

namespace SimpleDingTalk\attendance;
use SimpleDingTalk\Url;
use SimpleDingTalk\ApiRequest;
use SimpleDingTalk\util\Time;
/**
 * 考勤排班
 */
class Schedule
{
    /**
     * 查询成员排班信息
     *
     * @param string $op_user_id
     * @param string $user_id
     * @param string $date_time
     * @return mixed
     */
    public static function listbyday(string $op_user_id,string $user_id,string $date_time)
    {
        
        $uri=Url::$api['attendance']['schedule']['listbyday'];
      
        $json = [
            'op_user_id' => $op_user_id,
            'user_id'=>$user_id,
            'date_time'=>Time::toTime($date_time,true)
         
        ];
      
        return ApiRequest::post($uri, $json);
    }
    /**
     * 批量查询人员排班信息
     *
     * @param string $op_user_id
     * @param string $userids
     * @param string $from_date_time
     * @param string $to_date_time
     * @return mixed
     */
    public static function listbyusers(string $op_user_id,string $userids,string $from_date_time,string $to_date_time)
    {
        $uri=Url::$api['attendance']['schedule']['listbyusers'];
      
        $json = [
            'op_user_id' => $op_user_id,
            'userids'=>$userids,
            'from_date_time'=>Time::toTime($from_date_time,true),
            'to_date_time'=>Time::toTime($to_date_time,true),
         
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 排班制考勤组排班
     *
     * @param string $op_user_id
     * @param integer $group_id
     * @param array $schedules
     * @return mixed
     */
    public static function set(string $op_user_id,int $group_id,array $schedules)
    {
        $uri=Url::$api['attendance']['schedule']['set'];
        $date=$schedules['work_date'];
        $schedules['work_date']=Time::toTime($date,true);
        $json = [
            'op_user_id' => $op_user_id,
            'group_id'=>$group_id,
            'schedules'=>$schedules
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 查询排班打卡结果
     *
     * @param string $op_user_id
     * @param string $schedule_ids
     * @return mixed
     */
    public static function listbyids(string $op_user_id,string $schedule_ids)
    {
        $uri=Url::$api['attendance']['schedule']['listbyids'];
      
        $json = [
            'op_user_id' => $op_user_id,
            'schedule_ids'=>$schedule_ids
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 查询企业考勤排班详情
     *
     * @param string $workDate
     * @param integer $offset
     * @param integer $size
     * @return mixed
     */
    public static function listschedule(string $workDate,int $offset=0,int $size=10)
    {
        $uri=Url::$api['attendance']['schedule']['listschedule'];
      
        $json = [
            'workDate' => $workDate,
            'offset'=>$offset,
            'size'=>$size
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 查询排班概要信息
     *
     * @param string $op_user_id
     * @param string $userids
     * @param string $from_date_time
     * @param string $to_date_time
     * @return mixed
     */
    public static function listbydays(string $op_user_id,string $userids,string $from_date_time,string $to_date_time)
    {
        $uri=Url::$api['attendance']['schedule']['listbydays'];
      
        $json = [
            'op_user_id' => $op_user_id,
            'userids'=>$userids,
            'from_date_time'=>Time::toTime($from_date_time,true),
            'to_date_time'=>Time::toTime($to_date_time,true)
        ];
        return ApiRequest::post($uri, $json);
    }
}