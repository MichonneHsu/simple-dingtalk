<?php

declare(strict_types=1);

namespace SimpleDingTalk\attendance;
use SimpleDingTalk\Url;

use SimpleDingTalk\apiRequest;
class VacationManagement
{
    public static function create(array $json)
    {
        $uri=Url::$api['attendance']['vacationManagement']['create'];
        $json=self::parse_data($json);
        return apiRequest::post($uri, $json);
    }
    public static function update(array $json)
    {
        $uri=Url::$api['attendance']['vacationManagement']['update'];
        $json=self::parse_data($json);
        return apiRequest::post($uri, $json);
    }
    public static function remove(string $op_userid,string $leave_code)
    {
        $uri=Url::$api['attendance']['vacationManagement']['rmeove'];
        
        $json=[
            'op_userid'=>$op_userid,
            'leave_code'=>$leave_code
        ];
       
        return apiRequest::post($uri, $json);
    }
    public static function type_list(string $op_userid,string $vacation_source)
    {
        $uri=Url::$api['attendance']['vacationManagement']['type_list'];
        
        $json=[
            'op_userid'=>$op_userid,
            'vacation_source'=>$vacation_source
        ];
       
        return apiRequest::post($uri, $json);
    }
    public static function quota_init(string $op_userid,array $leave_quotas)
    {
        $uri=Url::$api['attendance']['vacationManagement']['quota_init'];
        if(array_key_exists('quota_num_per_day',$leave_quotas)){
            $quota_num_per_day=$leave_quotas['quota_num_per_day']*100;
            $leave_quotas['quota_num_per_day']=$quota_num_per_day;
        }
        if(array_key_exists('quota_num_per_hour',$leave_quotas)){
            $quota_num_per_day=$leave_quotas['quota_num_per_hour']*100;
            $leave_quotas['quota_num_per_hour']=$quota_num_per_day;
        }
        $json=[
            'op_userid'=>$op_userid,
            'leave_quotas'=>$leave_quotas
        ];
       
        return apiRequest::post($uri, $json);
    }
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
    public static function quota_update(string $op_userid,array $leave_quotas)
    {
        $uri=Url::$api['attendance']['vacationManagement']['quota_update'];
        
        $json=[
            'op_userid'=>$op_userid,
            'leave_quotas'=>$leave_quotas
        ];
       
        return apiRequest::post($uri, $json);
    }
    public static function record_list(string $op_userid,array $leave_quotas)
    {
        $uri=Url::$api['attendance']['vacationManagement']['record_list'];
        
        $json=[
            'op_userid'=>$op_userid,
            'leave_quotas'=>$leave_quotas
        ];
       
        return apiRequest::post($uri, $json);
    }

    public static function parse_data(array $json){
        if(array_key_exists('hours_in_per_day',$json)){
            $hours_in_per_day=$json['hours_in_per_day']*1000;
            $json['hours_in_per_day']=$hours_in_per_day;
        }
        if(array_key_exists('extras',$json)){
            $extras=json_encode($json['extras']);
            $json['extras']=$extras;
        }

        return $json;
    }
}