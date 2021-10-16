<?php

declare(strict_types=1);

namespace SimpleDingTalk;

class Attendance
{
    /**
     * 批量获取考勤组详情
     *
     * @param integer $offset
     * @param integer $size
     * @return mixed
     */
    public static function getsimplegroups(int $offset=0,int $size=10)
    {
        $uri = Url::joinParams(Url::$api['attendance']['getsimplegroups'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'offset' => $offset,
            'size'=>$size
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 获取用户考勤组 function
     *
     * @param string $userid
     * @return mixed
     */
    public static function getusergroup(string $userid)
    {
        $uri = Url::joinParams(Url::$api['attendance']['getusergroup'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'userid' => $userid
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 获取考勤组成员
     *
     * @param string $op_user_id
     * @param integer $group_id
     * @param integer $cursor
     * @return mixed
     */
    public static function group_member_list(string $op_user_id,int $group_id,int $cursor=1)
    {
        $uri = Url::joinParams(Url::$api['attendance']['group_member_list'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'op_user_id' => $op_user_id,
            'group_id'=>$group_id,
            'cursor'=>$cursor
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 考勤组成员校验
     *
     * @param string $op_user_id
     * @param integer $group_id
     * @param string $member_ids
     * @param integer $member_type
     * @return mixed
     */
    public static function group_member_listbyids(string $op_user_id,int $group_id,string $member_ids,int $member_type)
    {
        $uri = Url::joinParams(Url::$api['attendance']['group_member_listbyids'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'op_user_id' => $op_user_id,
            'group_id'=>$group_id,
            'member_ids'=>$member_ids,
            'member_type'=>$member_type
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 更新考勤组成员
     *
     * @param string $op_user_id
     * @param integer $group_id
     * @param integer $schedule_flag
     * @param array $update_param
     * @return mixed
     */
    public static function group_member_update(string $op_user_id,int $group_id,int $schedule_flag,array $update_param)
    {
        $uri = Url::joinParams(Url::$api['attendance']['group_member_update'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'op_user_id' => $op_user_id,
            'group_id'=>$group_id,
            'schedule_flag'=>$schedule_flag,
            'update_param'=>$update_param
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 获取考勤组员工的userid
     *
     * @param string $op_user_id
     * @param integer $group_id
     * @param integer $cursor
     * @return mixed
     */
    public static function group_memberusers_list(string $op_user_id,int $group_id,int $cursor)
    {
        $uri = Url::joinParams(Url::$api['attendance']['group_memberusers_list'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'op_user_id' => $op_user_id,
            'group_id'=>$group_id,
            'cursor'=>$cursor
        ];
        return apiRequest::post($uri, $json);
    }

}
