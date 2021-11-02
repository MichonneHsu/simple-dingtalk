<?php

declare(strict_types=1);

namespace SimpleDingTalk\attendance;

use SimpleDingTalk\Url;
use SimpleDingTalk\apiRequest;
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

        return apiRequest::post($uri, $json);
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
        return apiRequest::post($uri, $json);
    }
    /**
     * 通知补卡通过
     *
     * @param string $userid
     * @param string $work_date
     * @param integer $punch_id
     * @param string $punch_check_time
     * @param string $user_check_time
     * @param string $approve_id
     * @param string $jump_url
     * @param string $tag_name
     * @return mixed
     */
    public static function check(string $userid, string $work_date, int $punch_id, string  $punch_check_time, string $user_check_time, string $approve_id, string $jump_url, string $tag_name)
    {
        $uri = Url::$api['attendance']['approve']['check'];
        $json = [
            'userid' => $userid,
            'work_date' => $work_date,
            'punch_id' => $punch_id,
            'punch_check_time'=>$punch_check_time,
            'user_check_time'=>$user_check_time,
            'approve_id' => $approve_id,
            'jump_url'=>$jump_url,
            'tag_name'=>$tag_name
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 计算请假时长
     *
     * @param string $userid
     * @param integer $biz_type
     * @param string $from_time
     * @param string $to_time
     * @param string $duration_unit
     * @param string $calculate_model
     * @return mixed
     */
    public static function duration_calculate(string $userid, int $biz_type, string $from_time, string  $to_time, string $duration_unit, string $calculate_model)
    {
        $uri = Url::$api['attendance']['approve']['duration_calculate'];
        $json = [
            'userid' => $userid,
            'biz_type' => $biz_type,
            'from_time' => $from_time,
            'to_time'=>$to_time,
            'duration_unit'=>$duration_unit,
            'calculate_model' => $calculate_model
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 通知换班通过
     *
     * @param string $userid
     * @param string $switch_date
     * @param string $reback_date
     * @param string $apply_userid
     * @param string $target_userid
     * @param string $approve_id
     * @param string $apply_shift_id
     * @param string $target_shift_id
     * @param string $reback_apply_shift_id
     * @param string $reback_target_shift_id
     * @return mixed
     */
    public static function schedule_switch(string $userid, string $switch_date, string $reback_date, string $apply_userid, string $target_userid, string $approve_id,int $apply_shift_id,int $target_shift_id,int $reback_apply_shift_id,int $reback_target_shift_id)
    {
        $uri = Url::$api['attendance']['approve']['schedule_switch'];
        $json = [
            'userid' => $userid,
            'switch_date' => $switch_date,
            'reback_date' => $reback_date,
            'apply_userid'=>$apply_userid,
            'target_userid'=>$target_userid,
            'approve_id' => $approve_id,
            'apply_shift_id'=>$apply_shift_id,
            'target_shift_id'=>$target_shift_id,
            'reback_apply_shift_id'=>$reback_apply_shift_id,
            'reback_target_shift_id'=>$reback_target_shift_id
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 计算请假时长
     *
     * @param string $userid_list
     * @param string $start_time
     * @param string $end_time
     * @param integer $offset
     * @param integer $size
     * @return mixed
     */
    public static function getleaveapproveduration(string $userid_list, string $start_time, string $end_time,int $offset,int $size=10)
    {
        $isMilisecond =true;
        $uri = Url::$api['attendance']['approve']['getleaveapproveduration'];
        $json = [
            'userid_list' => $userid_list,
            'start_time' => Time::toTime($start_time,$isMilisecond),
            'end_time' => Time::toTime($end_time,$isMilisecond),
            'offset'=>$offset,
            'size'=>$size
        ];
        return apiRequest::post($uri, $json);
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
        return apiRequest::post($uri, $json);
    }
}
