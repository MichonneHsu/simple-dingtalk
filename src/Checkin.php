<?php

declare(strict_types=1);

namespace SimpleDingTalk;
use SimpleDingTalk\util\Time;
use SimpleDingTalk\AccessToken;
/**
 * 签到
 */
class Checkin
{
    /**
     * 获取用户签到记录
     *
     * @param string $userid_list
     * @param string $start_time
     * @param string $end_time
     * @param integer $cursor
     * @param integer $size
     * @return mixed
     */
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
    /**
     * 获取部门用户签到记录
     *
     * @param array $query
     * @return mixed
     */
    public static function record(array $query){
        $uri=Url::$api['checkin']['record'];
        $query['start_time']=Time::toTime($query['start_time'],true);
        $query['end_time']=Time::toTime($query['end_time'],true);
        $query['access_token']=AccessToken::getToken();
        return ApiRequest::get($uri, $query,false);
    }
}