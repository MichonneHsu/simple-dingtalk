<?php

declare(strict_types=1);

namespace SimpleDingTalk\attendance;
use SimpleDingTalk\Url;
use SimpleDingTalk\util\Time;
use SimpleDingTalk\apiRequest;
/**
 * 假期管理
 */
class VacationManagement
{
    /**
     * 更新假期类型
     *
     * @param array $json
     * @return void
     */
    public static function create(array $json)
    {
        $uri=Url::$api['attendance']['vacationManagement']['create'];
        $json=self::parse_save_data($json);
        return apiRequest::post($uri, $json);
    }
    /**
     * 更新假期类型s
     *
     * @param array $json
     * @return void
     */
    public static function update(array $json)
    {
        $uri=Url::$api['attendance']['vacationManagement']['update'];
        $json=self::parse_save_data($json);
        return apiRequest::post($uri, $json);
    }
    /**
     * 更新假期类型
     *
     * @param string $op_userid
     * @param string $leave_code
     * @return void
     */
    public static function remove(string $op_userid,string $leave_code)
    {
        $uri=Url::$api['attendance']['vacationManagement']['rmeove'];
        
        $json=[
            'op_userid'=>$op_userid,
            'leave_code'=>$leave_code
        ];
       
        return apiRequest::post($uri, $json);
    }
    /**
     * 查询假期类型
     *
     * @param string $op_userid
     * @param string $vacation_source
     * @return void
     */
    public static function type_list(string $op_userid,string $vacation_source)
    {
        $uri=Url::$api['attendance']['vacationManagement']['type_list'];
        
        $json=[
            'op_userid'=>$op_userid,
            'vacation_source'=>$vacation_source
        ];
       
        return apiRequest::post($uri, $json);
    }
    /**
     * 初始化假期余额
     *
     * @param string $op_userid
     * @param array $leave_quotas
     * @return void
     */
    public static function quota_init(string $op_userid,array $leave_quotas)
    {
        $uri=Url::$api['attendance']['vacationManagement']['quota_init'];
       
       
        $json=[
            'op_userid'=>$op_userid,
            'leave_quotas'=>self::parse_quote_save_data($leave_quotas)
        ];
       
        return apiRequest::post($uri, $json);
    }
    /**
     * 查询假期余额
     *
     * @param string $op_userid
     * @param string $leave_code
     * @param string $userids
     * @param integer $offset
     * @param integer $size
     * @return void
     */
    public static function quota_list(string $op_userid,string $leave_code,string $userids,int $offset=0,int $size=10)
    {
        $uri=Url::$api['attendance']['vacationManagement']['quota_list'];
        
        $json=[
            'op_userid'=>$op_userid,
            'leave_code'=>$leave_code,
            'userids'=>$userids,
            'offset'=>$offset,
            'size'=>$size
        ];
       
        return apiRequest::post($uri, $json);
    }
    /**
     * 批量更新假期余额
     *
     * @param string $op_userid
     * @param array $leave_quotas
     * @return void
     */
    public static function quota_update(string $op_userid,array $leave_quotas)
    {
        $uri=Url::$api['attendance']['vacationManagement']['quota_update'];
        for($i=0;$i<count($leave_quotas);$i++){
            $leave_quotas[$i]=self::parse_quote_save_data($leave_quotas[$i]);
        }
        $json=[
            'op_userid'=>$op_userid,
            'leave_quotas'=>$leave_quotas
        ];
       
        return apiRequest::post($uri, $json);
    }
    /**
     * 查询假期消费记录s
     *
     * @param string $op_userid
     * @param string $leave_code
     * @param string $userids
     * @param integer $offset
     * @param integer $size
     * @return void
     */
    public static function record_list(string $op_userid,string $leave_code,string $userids,int $offset=0,int $size=10)
    {
        $uri=Url::$api['attendance']['vacationManagement']['record_list'];
        
        $json=[
            'op_userid'=>$op_userid,
            'leave_code'=>$leave_code,
            'userids'=>$userids,
            'offset'=>$offset,
            'size'=>$size
        ];
       
        return apiRequest::post($uri, $json);
    }
    /**
     * 假期余额数据格式转换
     *
     * @param array $leave_quotas
     * @return array
     */
    public static function parse_quote_save_data(array $leave_quotas){
        $isMilisecond=true;
        $start_time=Time::toTime($leave_quotas['start_time'],$isMilisecond);
        $end_time=Time::toTime($leave_quotas['end_time'],$isMilisecond);
        $leave_quotas['start_time']=$start_time;
        $leave_quotas['end_time']=$end_time;
        if(array_key_exists('quota_num_per_day',$leave_quotas)){
            $quota_num_per_day=$leave_quotas['quota_num_per_day']*100;
            $leave_quotas['quota_num_per_day']=$quota_num_per_day;
        }
        if(array_key_exists('quota_num_per_hour',$leave_quotas)){
            $quota_num_per_day=$leave_quotas['quota_num_per_hour']*100;
            $leave_quotas['quota_num_per_hour']=$quota_num_per_day;
        }

        return $leave_quotas;
    }
    /**
     * 假期类型数据格式转换
     *
     * @param array $json
     * @return array
     */
    public static function parse_save_data(array $json){
        if(array_key_exists('hours_in_per_day',$json)){
            $hours_in_per_day=$json['hours_in_per_day']*100;
            $json['hours_in_per_day']=$hours_in_per_day;
        }
        if(array_key_exists('extras',$json)){
            $extras=json_encode($json['extras']);
            $json['extras']=$extras;
        }

        return $json;
    }
}