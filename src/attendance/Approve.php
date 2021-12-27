<?php

declare(strict_types=1);

namespace SimpleDingTalk\attendance;

use SimpleDingTalk\Url;
use SimpleDingTalk\ApiRequest;
use SimpleDingTalk\util\Time;

/**
 * 考勤假勤
 */
class Approve
{
    /**
     * 通知审批通过
     *
     * @param array $json
     * @return mixed
     */
    public static function finish(array $json)
    {
        $uri = Url::$api['attendance']['approve']['finish'];

        return ApiRequest::post($uri, $json);
    }
    /**
     * 通知审批撤销
     *
     * @param string $userid
     * @param string $approve_id
     * @return mixed
     */
    public static function cancel(string $userid, string $approve_id)
    {
        $uri = Url::$api['attendance']['approve']['cancel'];
        $json = [
            'userid' => $userid,
            'approve_id' => $approve_id
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 通知补卡通过
     *
     * @param array $json
     * @return mixed
     */
    public static function check(array $json)
    {
        $uri = Url::$api['attendance']['approve']['check'];
       
        return ApiRequest::post($uri, $json);
    }
    /**
     * 计算请假时长
     *
     * @param array $json
     * @return mixed
     */
    public static function duration_calculate(array $json)
    {
        $uri = Url::$api['attendance']['approve']['duration_calculate'];
       
        return ApiRequest::post($uri, $json);
    }
    /**
     * 通知换班通过
     *
     * @param array $json
     * @return mixed
     */
    public static function schedule_switch(array $json)
    {
        $uri = Url::$api['attendance']['approve']['schedule_switch'];
        
        return ApiRequest::post($uri, $json);
    }
    /**
     * 计算请假时长
     *
     * @param string $userid
     * @param string $from_date
     * @param string $to_date
     * @return mixed
     */
    public static function getleaveapproveduration(string $userid, string $from_date, string $to_date)
    {
       
        $uri = Url::$api['attendance']['approve']['getleaveapproveduration'];
        $json = [
            'userid' => $userid,
            'from_date' => $from_date,
            'to_date' =>$to_date 
        ];
        return ApiRequest::post($uri, $json);
    }

    public static function getleavestatus(string $userid_list, string $start_time, string $end_time,int $offset,int $size=10)
    {
        $isMilisecond =true;
        $uri = Url::$api['attendance']['approve']['getleavestatus'];
        $json = [
            'userid_list' => $userid_list,
            'start_time' => Time::toTime($start_time,$isMilisecond),
            'end_time' => Time::toTime($end_time,$isMilisecond),
            'offset'=>$offset,
            'size'=>$size
        ];
        return ApiRequest::post($uri, $json);
    }
}
