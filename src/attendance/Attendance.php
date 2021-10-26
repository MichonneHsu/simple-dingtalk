<?php

declare(strict_types=1);

namespace SimpleDingTalk\attendance;
use SimpleDingTalk\Url;
use SimpleDingTalk\AccessToken;
use SimpleDingTalk\apiRequest;
class GroupManagerment
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
    /**
     * 获取考勤组详情
     *
     * @param string $op_user_id
     * @param integer $group_id
     * @return mixed
     */
    public static function group_query(string $op_user_id,int $group_id)
    {
        $uri = Url::joinParams(Url::$api['attendance']['group_query'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'op_user_id' => $op_user_id,
            'group_id'=>$group_id
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 搜索考勤组摘要
     *
     * @param string $op_user_id
     * @param string $group_name
     * @return mixed
     */
    public static function group_search(string $op_user_id,string $group_name)
    {
        $uri = Url::joinParams(Url::$api['attendance']['group_search'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'op_user_id' => $op_user_id,
            'group_name'=>$group_name
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 批量新增wifi信息
     *
     * @param string $op_user_id
     * @param string $group_key
     * @param array $wifi_list
     * @return mixed
     */
    public static function group_wifis_add(string $op_user_id,string $group_key,array $wifi_list)
    {
        $uri = Url::joinParams(Url::$api['attendance']['group_wifis_add'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'op_user_id' => $op_user_id,
            'group_key'=>$group_key,
            'wifi_list'=>$wifi_list
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 批量移除wifi
     *
     * @param string $op_user_id
     * @param string $group_key
     * @param string $wifi_key_list
     * @return mixed
     */
    public static function group_wifis_remove(string $op_user_id,string $group_key,string $wifi_key_list)
    {
        $uri = Url::joinParams(Url::$api['attendance']['group_wifis_remove'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'op_user_id' => $op_user_id,
            'group_key'=>$group_key,
            'wifi_key_list'=>$wifi_key_list
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 批量查询wifi
     *
     * @param string $op_user_id
     * @param string $group_key
     * @param string $cursor
     * @param integer $size
     * @return mixed
     */
    public static function group_wifis_query(string $op_user_id,string $group_key,string $cursor,int $size=10)
    {
        $uri = Url::joinParams(Url::$api['attendance']['group_wifis_query'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'op_user_id' => $op_user_id,
            'group_key'=>$group_key,
            'cursor'=>$cursor,
            'size'=>$size
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 批量新增position
     *
     * @param string $op_user_id
     * @param string $group_key
     * @param array $position_list
     * @return mixed
     */
    public static function group_positions_add(string $op_user_id,string $group_key,array $position_list)
    {
        $uri = Url::joinParams(Url::$api['attendance']['group_positions_add'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'op_user_id' => $op_user_id,
            'group_key'=>$group_key,
            'position_list'=>$position_list
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 批量删除position
     *
     * @param string $op_user_id
     * @param string $group_key
     * @param string $position_key_list
     * @return mixed
     */
    public static function group_positions_remove(string $op_user_id,string $group_key,string $position_key_list)
    {
        $uri = Url::joinParams(Url::$api['attendance']['group_positions_remove'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'op_user_id' => $op_user_id,
            'group_key'=>$group_key,
            'position_key_list'=>$position_key_list
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 批量查询position
     *
     * @param string $op_user_id
     * @param string $group_key
     * @param string $cursor
     * @param integer $size
     * @return mixed
     */
    public static function group_positions_query(string $op_user_id,string $group_key,string $cursor,  int $size)
    {
        $uri = Url::joinParams(Url::$api['attendance']['group_positions_query'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'op_user_id' => $op_user_id,
            'group_key'=>$group_key,
            'cursor'=>$cursor,
            'size'=>$size
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 创建考勤组
     *
     * @param string $op_user_id
     * @param array $top_group
     * @return mixed
     */
    public static function group_add(string $op_user_id,array $top_group)
    {
        $uri = Url::joinParams(Url::$api['attendance']['group_add'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'op_user_id' => $op_user_id,
            'top_group'=>$top_group
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 更新考勤组
     *
     * @param string $op_user_id
     * @param array $top_group
     * @return mixed
     */
    public static function group_modify(string $op_user_id,array $top_group)
    {
        $uri = Url::joinParams(Url::$api['attendance']['group_modify'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'op_user_id' => $op_user_id,
            'top_group'=>$top_group
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 删除考勤组
     *
     * @param string $op_user_id
     * @param string $group_key
     * @return mixed
     */
    public static function group_remove(string $op_user_id,string $group_key)
    {
        $uri = Url::joinParams(Url::$api['attendance']['group_remove'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'op_user_id' => $op_user_id,
            'group_key'=>$group_key
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 批量新增考勤组成员
     *
     * @param string $op_user_id
     * @param string $group_key
     * @param string $user_id_list
     * @return mixed
     */
    public static function group_users_add(string $op_user_id,string $group_key,string $user_id_list)
    {
        $uri = Url::joinParams(Url::$api['attendance']['group_users_add'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'op_user_id' => $op_user_id,
            'group_key'=>$group_key,
            'user_id_list'=>$user_id_list
        ];
        return apiRequest::post($uri, $json);
    
    }
    /**
     * 批量删除考勤组成员
     *
     * @param string $op_user_id
     * @param string $group_key
     * @param string $user_id_list
     * @return mixed
     */
    public static function group_users_remove(string $op_user_id,string $group_key,string $user_id_list)
    {
        $uri = Url::joinParams(Url::$api['attendance']['group_users_remove'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'op_user_id' => $op_user_id,
            'group_key'=>$group_key,
            'user_id_list'=>$user_id_list
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 查询考勤组员工
     *
     * @param string $op_user_id
     * @param string $group_key
     * @param string $cursor
     * @param integer $size
     * @return mixed
     */
    public static function group_users_query(string $op_user_id,string $group_key,string $cursor,int $size=10)
    {
        $uri = Url::joinParams(Url::$api['attendance']['group_users_query'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'op_user_id' => $op_user_id,
            'group_key'=>$group_key,
            'cursor'=>$cursor,
            'size'=>$size
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 根据groupkey查询考勤组信息
     *
     * @param string $op_user_id
     * @param string $group_key
     * @return mixed
     */
    public static function group_get(string $op_user_id,string $group_key)
    {
        $uri = Url::joinParams(Url::$api['attendance']['group_get'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'op_user_id' => $op_user_id,
            'group_key'=>$group_key
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * groupKey转换为groupId
     *
     * @param string $op_user_id
     * @param string $group_key
     * @return mixed
     */
    public static function group_keytoid(string $op_user_id,string $group_key)
    {
        $uri = Url::joinParams(Url::$api['attendance']['group_keytoid'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'op_user_id' => $op_user_id,
            'group_key'=>$group_key,
           
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * groupId转换为groupKey
     *
     * @param string $op_user_id
     * @param integer $group_id
     * @return mixed
     */
    public static function group_idtokey(string $op_user_id,int $group_id)
    {
        $uri = Url::joinParams(Url::$api['attendance']['group_idtokey'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'op_user_id' => $op_user_id,
            'group_id'=>$group_id
        ];
        return apiRequest::post($uri, $json);
    }
}
