<?php

declare(strict_types=1);

namespace SimpleDingTalk;
/**
 * 行业通讯录
 */
class ContactLog
{
    /**
     * 获取部门详情
     *
     * @param integer $dept_id
     * @return mixed
     */
    public static function get_department(int $dept_id)
    {
        $uri = Url::$api['contact_log']['get_department'];
        $json = [
            'dept_id' => $dept_id
        ];
        return ApiRequest::post($uri, $json);
    }
   /**
    * 获取部门用户详情
    *
    * @param integer $dept_id
    * @param string $userid
    * @return mixed
    */
    public static function get_user(int $dept_id,string $userid)
    {
        $uri = Url::$api['contact_log']['get_user'];
        $json=[
            'dept_id'=>$dept_id,
            'userid'=>$userid
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 获取部门下人员列表
     *
     * @param integer $json
     * @return mixed
     */
    public static function get_user_list(int $dept_id,string $role,int $cursor=1,int $size=10)
    {
        $uri = Url::$api['contact_log']['get_user_list'];
        $json=[
            'dept_id'=>$dept_id,
            'role'=>$role,
            'cursor'=>$cursor,
            'size'=>$size
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 获取部门列表
     *
     * @param integer $dept_id
     * @param integer $cursor
     * @param integer $size
     * @return mixed
     */
    public static function get_department_list(int $dept_id,int $cursor=1,int $size=10)
    {
        $uri = Url::$api['contact_log']['get_department_list'];
        $json=[
            'dept_id'=>$dept_id,
            'cursor'=>$cursor,
            'size'=>$size
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 获取企业信息
     * 
     * @return mixed
     */
    public static function get_organization()
    {
        $uri = Url::$api['contact_log']['get_organization'];

        return ApiRequest::post($uri);
    }
}
