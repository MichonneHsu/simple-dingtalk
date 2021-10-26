<?php

declare(strict_types=1);

namespace SimpleDingTalk;

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
        return apiRequest::post($uri, $json);
    }
    /**
     * 获取部门用户详情
     *
     * @param integer $json
     * @return mixed
     */
    public static function get_user(array $json)
    {
        $uri = Url::$api['contact_log']['get_user'];

        return apiRequest::post($uri, $json);
    }
    /**
     * 获取部门下人员列表
     *
     * @param integer $json
     * @return mixed
     */
    public static function get_user_list(array $json)
    {
        $uri = Url::$api['contact_log']['get_user_list'];

        return apiRequest::post($uri, $json);
    }
    /**
     * 获取部门列表
     *
     * @param integer $json
     * @return mixed
     */
    public static function get_department_list(array $json)
    {
        $uri = Url::$api['contact_log']['get_department_list'];

        return apiRequest::post($uri, $json);
    }
    /**
     * 获取企业信息
     * 
     * @return mixed
     */
    public static function get_organization()
    {
        $uri = Url::$api['contact_log']['get_organization'];

        return apiRequest::post($uri);
    }
}
