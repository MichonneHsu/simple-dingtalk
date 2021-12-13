<?php

declare(strict_types=1);

namespace SimpleDingTalk;
use SimpleDingTalk\util\Time;
/**
 * 签到
 */
class Checkin
{
    public static function get(string $userid_list,string $start_time,string $end_time,int $cursor=0,int $size=10){
        $uri=Url::$api['checkin']['get'];
        $start_time=Time::toTime($start_time,true);
        $end_time=Time::toTime($end_time,true);
        $json=[
            'userid_list'=>$userid_list,
            'start_time'=>$start_time,
            'end_time'=>$end_time,
            'cursor'=>$cursor,
            'size'=>$size
        ];
        return ApiRequest::post($uri, $json);
    }

    public static function record(array $json){
        $uri=Url::$api['checkin']['record'];
        $json['start_time']=Time::toTime($json['start_time'],true);
        $json['end_time']=Time::toTime($json['end_time'],true);
        
        return ApiRequest::post($uri, $json);
    }
}